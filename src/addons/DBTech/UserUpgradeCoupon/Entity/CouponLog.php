<?php

namespace DBTech\UserUpgradeCoupon\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int|null coupon_log_id
 * @property int user_upgrade_id
 * @property int coupon_id
 * @property float coupon_discounts
 * @property string currency
 * @property int log_date
 * @property int user_id
 * @property int ip_id
 * @property array log_details
 *
 * RELATIONS
 * @property \XF\Entity\UserUpgrade Upgrade
 * @property \DBTech\UserUpgradeCoupon\Entity\Coupon Coupon
 * @property \XF\Entity\User User
 * @property \XF\Entity\Ip Ip
 */
class CouponLog extends Entity
{
	/**
	 * @param \XF\Mvc\Entity\Structure $structure
	 *
	 * @return \XF\Mvc\Entity\Structure
	 */
	public static function getStructure(Structure $structure): Structure
	{
		$structure->table = 'xf_dbtech_user_upgrade_coupon_log';
		$structure->shortName = 'DBTech\UserUpgradeCoupon:CouponLog';
		$structure->primaryKey = 'coupon_log_id';
		$structure->columns = [
			'coupon_log_id'    => ['type' => self::UINT, 'autoIncrement' => true, 'nullable' => true],
			'user_upgrade_id'  => ['type' => self::UINT, 'required' => true, 'default' => 0],
			'coupon_id'        => ['type' => self::UINT, 'required' => true, 'default' => 0],
			'coupon_discounts' => ['type' => self::FLOAT, 'min' => 0, 'default' => 0.00],
			'currency'         => ['type' => self::STR, 'maxLength' => 3, 'required' => true],
			'log_date'         => ['type' => self::UINT, 'default' => \XF::$time],
			'user_id'          => ['type' => self::UINT, 'default' => 0],
			'ip_id'            => ['type' => self::UINT, 'default' => 0],
			'log_details'      => ['type' => self::JSON_ARRAY, 'default' => []],
		];
		$structure->behaviors = [];
		$structure->getters = [];
		$structure->relations = [
			'Upgrade' => [
				'entity'     => 'XF:UserUpgrade',
				'type'       => self::TO_ONE,
				'conditions' => 'user_upgrade_id',
				'primary'    => true
			],
			'Coupon'  => [
				'entity'     => 'DBTech\UserUpgradeCoupon:Coupon',
				'type'       => self::TO_ONE,
				'conditions' => 'coupon_id',
				'primary'    => true
			],
			'User'    => [
				'entity'     => 'XF:User',
				'type'       => self::TO_ONE,
				'conditions' => 'user_id',
				'primary'    => true
			],
			'Ip'      => [
				'entity'     => 'XF:Ip',
				'type'       => self::TO_ONE,
				'conditions' => 'ip_id',
				'primary'    => true
			]
		];

		return $structure;
	}
}