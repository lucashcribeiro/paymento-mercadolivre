<?php

namespace DBTech\UserUpgradeCoupon\Install;

/**
 * @property \XF\AddOn\AddOn addOn
 * @property \XF\App app
 *
 * @method \XF\Db\AbstractAdapter db()
 * @method \XF\Db\SchemaManager schemaManager()
 */
trait UninstallDataTrait
{
	/**
	 * Methods MUST start at step 4, as steps 1-3 are reserved by the core
	 */
	
	protected function runMiscCleanUp(): void
	{
		// Get rid of change logs
		$this->db()->delete('xf_change_log', "content_type LIKE 'dbtech_upgrade_coupon_%'");
		$this->db()->delete('xf_change_log', "field LIKE 'dbtech_upgrade_coupon_%'");
	}
}