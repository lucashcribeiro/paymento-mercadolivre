<?php

namespace DBTech\UserUpgradeCoupon\Install;

use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;

/**
 * @property \XF\AddOn\AddOn addOn
 * @property \XF\App app
 *
 * @method \XF\Db\AbstractAdapter db()
 * @method \XF\Db\SchemaManager schemaManager()
 * @method \XF\Db\Schema\Column addOrChangeColumn($table, $name, $type = null, $length = null)
 */
trait InstallDataTrait
{
	/**
	 * @return \Closure[]
	 */
	protected function getTables(): array
	{
		$tables = [];

		$tables['xf_dbtech_user_upgrade_coupon'] = function ($table)
		{
			/** @var Create|Alter $table */
			$this->addOrChangeColumn($table, 'coupon_id', 'int')->autoIncrement();
			$this->addOrChangeColumn($table, 'coupon_state', 'enum')->values(['visible', 'deleted'])->setDefault('visible');
			$this->addOrChangeColumn($table, 'coupon_code', 'varchar', 25);
			$this->addOrChangeColumn($table, 'coupon_type', 'enum')->values(['percent', 'value'])->setDefault('percent');
			$this->addOrChangeColumn($table, 'coupon_percent', 'decimal', '5,2')->setDefault('0.00');
			$this->addOrChangeColumn($table, 'coupon_value', 'decimal', '10,2')->setDefault('0.00');
			$this->addOrChangeColumn($table, 'start_date', 'int')->setDefault(0);
			$this->addOrChangeColumn($table, 'expiry_date', 'int')->setDefault(0);
			$this->addOrChangeColumn($table, 'remaining_uses', 'int', 10)->unsigned(false)->setDefault(-1);
			$this->addOrChangeColumn($table, 'user_upgrade_discounts', 'mediumblob');
			$table->addKey('coupon_code');
		};

		$tables['xf_dbtech_user_upgrade_coupon_log'] = function ($table)
		{
			/** @var Create|Alter $table */
			$this->addOrChangeColumn($table, 'coupon_log_id', 'int')->autoIncrement();
			$this->addOrChangeColumn($table, 'user_upgrade_id', 'int');
			$this->addOrChangeColumn($table, 'coupon_id', 'int');
			$this->addOrChangeColumn($table, 'coupon_discounts', 'decimal', '10,2');
			$this->addOrChangeColumn($table, 'currency', 'char', 3);
			$this->addOrChangeColumn($table, 'log_date', 'int')->setDefault(0);
			$this->addOrChangeColumn($table, 'user_id', 'int');
			$this->addOrChangeColumn($table, 'ip_id', 'int')->setDefault(0);
			$this->addOrChangeColumn($table, 'log_details', 'mediumblob')->nullable(true);
			$table->addKey(['user_id', 'log_date'], 'user_id_log_date');
			$table->addKey('log_date');
			$table->addKey('user_upgrade_id');
			$table->addKey('coupon_id');
		};

		$tables['xf_dbtech_user_upgrade_coupon_value'] = function ($table)
		{
			/** @var Create|Alter $table */
			$this->addOrChangeColumn($table, 'coupon_id', 'int');
			$this->addOrChangeColumn($table, 'user_upgrade_id', 'int');
			$this->addOrChangeColumn($table, 'upgrade_value', 'decimal', '10,2')->setDefault('0.00');
			$table->addPrimaryKey(['coupon_id', 'user_upgrade_id']);
		};
		
		return $tables;
	}
	
	/**
	 * @return array
	 */
	protected function getAlterDefinitions(): array
	{
		return [];
	}
	
	/**
	 * @return array
	 */
	protected function getInstallQueries(): array
	{
		return [];
	}

	/**
	 * Returns true if permissions were modified, otherwise false.
	 *
	 * @return bool
	 */
	protected function applyPermissionsInstall(): bool
	{
		// Regular perms
		$this->applyGlobalPermission('dbtechUserUpgrade', 'useCoupons', 'general', 'viewNode');

		return true;
	}
	
	/**
	 * @return \Closure[]
	 */
	protected function getDefaultWidgetSetup(): array
	{
		return [];
	}
	
	/**
	 *
	 */
	protected function runPostInstallActions(): void
	{
	}
	
	/**
	 * @return array
	 */
	protected function getAdminPermissions(): array
	{
		return [];
	}
	
	/**
	 * @return array
	 */
	protected function getPermissionGroups(): array
	{
		return [
			'dbtechUpgradeCoupon',
			'dbtechUpgradeCouponAdmin'
		];
	}
	
	/**
	 * @return array
	 */
	protected function getContentTypes(): array
	{
		return [
			'dbtech_upgrade_coupon'
		];
	}
	
	/**
	 * @return array
	 */
	protected function getRegistryEntries(): array
	{
		return [];
	}
}