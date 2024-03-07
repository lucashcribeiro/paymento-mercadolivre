<?php

namespace DBTech\UserUpgradeCoupon\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int user_upgrade_id
 * @property int coupon_id
 * @property float upgrade_value
 */
class UpgradeCouponValue extends Entity
{
	/**
	 * @param \XF\Mvc\Entity\Structure $structure
	 *
	 * @return \XF\Mvc\Entity\Structure
	 */
	public static function getStructure(Structure $structure): Structure
	{
		$structure->table = 'xf_dbtech_user_upgrade_coupon_value';
		$structure->shortName = 'DBTech\UserUpgradeCoupon:UpgradeCouponValue';
		$structure->primaryKey = ['user_upgrade_id', 'coupon_id'];
		$structure->columns = [
			'user_upgrade_id' => ['type' => self::UINT, 'required' => true],
			'coupon_id' => ['type' => self::UINT, 'required' => true],
			'upgrade_value' => ['type' => self::FLOAT, 'default' => 0]
		];
		$structure->getters = [];
		$structure->relations = [];

		return $structure;
	}
}