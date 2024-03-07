<?php

namespace DBTech\UserUpgradeCoupon\Install;

/**
 * @property \XF\AddOn\AddOn addOn
 * @property \XF\App app
 *
 * @method \XF\Db\AbstractAdapter db()
 * @method \XF\Db\SchemaManager schemaManager()
 * @method \XF\Db\Schema\Column addOrChangeColumn($table, $name, $type = null, $length = null)
 */
trait UpgradeDataTrait
{
	/**
	 * @param $previousVersion
	 * @param array $stateChanges
	 */
	protected function runPostUpgradeActions($previousVersion, array &$stateChanges): void
	{
		$reflection = new \ReflectionObject($this);
		foreach ($reflection->getMethods() AS $method)
		{
			if (preg_match('/^postUpgrade(\d+)$/', $method->name, $match))
			{
				$versionId = intval($match[1]);

				if (!$previousVersion || $previousVersion >= $versionId)
				{
					continue;
				}

				$fnPattern = 'postUpgrade%d';
				$func = sprintf($fnPattern, $versionId);
				
				$this->$func($previousVersion, $stateChanges);
			}
		}
	}
}