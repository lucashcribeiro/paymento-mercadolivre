<?php

namespace DBTech\UserUpgradeCoupon;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Alter;

/**
 * Class Setup
 *
 * @package DBTech\UserUpgradeCoupon
 */
class Setup extends AbstractSetup
{
	// XF Core
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

	// Base helper
	use Install\InstallerTrait;
	
	// Install/upgrade/uninstall helpers
	use Install\InstallDataTrait;
	use Install\UpgradeDataTrait;
	use Install\UninstallDataTrait;


	/**
	 * @param array $errors
	 * @param array $warnings
	 */
	public function checkRequirements(&$errors = [], &$warnings = []): void
	{
		$this->checkSoftRequires($errors, $warnings);
		$this->isCliRecommended($warnings);
	}

	// ################################ INSTALLATION ####################
	
	/**
	 *
	 */
	public function installStep1(): void
	{
		$sm = $this->schemaManager();
		
		foreach ($this->getTables() AS $tableName => $closure)
		{
			$sm->createTable($tableName, $closure);
		}
	}
	
	/**
	 *
	 */
	public function installStep2(): void
	{
		$sm = $this->schemaManager();
		
		foreach ($this->getAlterTables() AS $tableName => $closure)
		{
			if ($sm->tableExists($tableName))
			{
				$sm->alterTable($tableName, $closure);
			}
		}
	}
	
	/**
	 * @throws \XF\Db\Exception
	 */
	public function installStep3(): void
	{
		foreach ($this->getInstallQueries() AS $query)
		{
			$this->db()->query($query);
		}
		
		foreach ($this->getAdminPermissions() AS $permissionId => $sourcePermission)
		{
			$this->db()->query("
				REPLACE INTO xf_admin_permission_entry
					(user_id, admin_permission_id)
				SELECT user_id, ?
				FROM xf_admin_permission_entry
				WHERE admin_permission_id = ?
			", [$permissionId, $sourcePermission]);
		}
		
		foreach ($this->getDefaultWidgetSetup() AS $widgetKey => $widgetFn)
		{
			$widgetFn($widgetKey);
		}
	}
	
	
	// ################################ POST INSTALL STEPS ####################
	
	/**
	 * @param array $stateChanges
	 *
	 * @throws \Exception
	 */
	public function postInstall(array &$stateChanges): void
	{
		if ($this->applyDefaultPermissions())
		{
			// since we're running this after data imports, we need to trigger a permission rebuild
			// if we changed anything
			$this->app->jobManager()->enqueueUnique(
				'permissionRebuild',
				'XF:PermissionRebuild',
				[],
				false
			);
		}
		
		$this->runPostInstallActions();
	}
	
	// ################################ POST UPGRADE STEPS ####################
	
	/**
	 * @param $previousVersion
	 * @param array $stateChanges
	 */
	public function postUpgrade($previousVersion, array &$stateChanges): void
	{
		if ($this->applyDefaultPermissions($previousVersion))
		{
			// since we're running this after data imports, we need to trigger a permission rebuild
			// if we changed anything
			$this->app->jobManager()->enqueueUnique(
				'permissionRebuild',
				'XF:PermissionRebuild',
				[],
				false
			);
		}
		
		$this->runPostUpgradeActions($previousVersion, $stateChanges);
	}
	
	// ################################ UNINSTALL ####################
	
	/**
	 *
	 */
	public function uninstallStep1(): void
	{
		$sm = $this->schemaManager();
		
		foreach (array_keys($this->getTables()) AS $tableName)
		{
			$sm->dropTable($tableName);
		}
		
		foreach ($this->getDefaultWidgetSetup() AS $widgetKey => $widgetFn)
		{
			$this->deleteWidget($widgetKey);
		}
	}
	
	/**
	 *
	 */
	public function uninstallStep2(): void
	{
		$sm = $this->schemaManager();
		
		foreach ($this->getAlterDefinitions() AS $tableName => $definitions)
		{
			if ($sm->tableExists($tableName))
			{
				$sm->alterTable($tableName, function (Alter $table) use ($definitions)
				{
					if (isset($definitions['columns']))
					{
						$table->dropColumns(array_keys($definitions['columns']));
					}
					
					if (isset($definitions['keys']))
					{
						$table->dropIndexes(array_keys($definitions['keys']));
					}
				});
			}
		}
	}
	
	/**
	 *
	 */
	public function uninstallStep3(): void
	{
		$db = $this->db();
		
		$contentTypes = $this->getContentTypes();
		if ($contentTypes)
		{
			$this->uninstallContentTypeData($contentTypes);
		}
		
		$db->beginTransaction();
		
		foreach ($this->getAdminPermissions() AS $permissionId)
		{
			$db->delete('xf_admin_permission_entry', "admin_permission_id = '$permissionId'");
		}
		
		$this->runMiscCleanUp();
		
		$permissionGroups = $this->getPermissionGroups();
		foreach ($permissionGroups as $permissionGroup)
		{
			$db->delete('xf_permission_entry', 'permission_group_id = ?', $permissionGroup);
			$db->delete('xf_permission_entry_content', 'permission_group_id = ?', $permissionGroup);
		}
		
		$registryEntries = $this->getRegistryEntries();
		foreach ($registryEntries AS $entry)
		{
			try
			{
				\XF::registry()->delete($entry);
			}
			catch (\Exception $e)
			{
			}
		}
		
		$db->commit();
	}
	
	// ############################# TABLE / DATA DEFINITIONS ##############################
	
	/**
	 * @return array
	 */
	protected function getAlterTables(): array
	{
		$tables = [];
		$alterDefinitions = $this->getAlterDefinitions();
		
		foreach ($alterDefinitions as $key => $definitions)
		{
			$tables[$key] = function (Alter $table) use ($definitions)
			{
				foreach ($definitions['columns'] as $name => $definition)
				{
					$column = $this->addOrChangeColumn($table, $name, $definition['type'], isset($definition['length']) ? $definition['length'] : null);

					if (isset($definition['unsigned']))
					{
						$column->unsigned($definition['unsigned']);
					}

					if (isset($definition['values']))
					{
						$column->values($definition['values']);
					}

					if (isset($definition['default']))
					{
						$column->setDefault($definition['default']);
					}
					
					if (isset($definition['nullable']))
					{
						$column->nullable($definition['nullable']);
					}
					
					if (isset($definition['after']))
					{
						$column->after($definition['after']);
					}
				}
				
				if (isset($definitions['keys']))
				{
					foreach ($definitions['keys'] as $indexName => $column)
					{
						$table->addKey($column, $indexName);
					}
				}
			};
		}
		
		return $tables;
	}
	
	/**
	 *
	 */
	protected function applyTables(): void
	{
		$sm = $this->schemaManager();
		
		foreach ($this->getTables() as $tableName => $closure)
		{
			$sm->createTable($tableName, $closure);
			$sm->alterTable($tableName, $closure);
		}
	}
	
	/**
	 * @param string $key
	 * @param array $options
	 *
	 * @throws \InvalidArgumentException
	 */
	protected function insertNamedWidget(string $key, array $options = []): void
	{
		$widgets = $this->getDefaultWidgetSetup();
		if (!isset($widgets[$key]))
		{
			throw new \InvalidArgumentException("Unknown widget '$key'");
		}
		
		$widgetFn = $widgets[$key];
		$widgetFn($key, $options);
	}
	
	/**
	 * @param null $previousVersion
	 *
	 * @return bool
	 */
	protected function applyDefaultPermissions($previousVersion = null): bool
	{
		$applied = false;
		
		if (!$previousVersion)
		{
			$applied = $this->applyPermissionsInstall();
		}
		
		$reflection = new \ReflectionObject($this);
		foreach ($reflection->getMethods() AS $method)
		{
			if (preg_match('/^applyPermissionsUpgrade(\d+)$/', $method->name, $match))
			{
				$versionId = intval($match[1]);
				
				$fnPattern = 'applyPermissionsUpgrade%d';
				$func = sprintf($fnPattern, $versionId);
				
				$applied = $this->$func($applied, $previousVersion);
			}
		}
		
		return $applied;
	}
}