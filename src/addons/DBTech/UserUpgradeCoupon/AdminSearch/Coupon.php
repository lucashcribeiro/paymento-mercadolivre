<?php

namespace DBTech\UserUpgradeCoupon\AdminSearch;

use XF\AdminSearch\AbstractPhrased;

/**
 * Class Coupon
 *
 * @package DBTech\UserUpgradeCoupon\AdminSearch
 */
class Coupon extends AbstractPhrased
{
	/**
	 * @return string
	 */
	protected function getFinderName(): string
	{
		return 'DBTech\UserUpgradeCoupon:Coupon';
	}

	/**
	 * @return string
	 */
	protected function getContentIdName(): string
	{
		return 'coupon_id';
	}

	/**
	 * @return string
	 */
	protected function getRouteName(): string
	{
		return 'dbtech-upgrades/coupons/edit';
	}

	/**
	 * @return int
	 */
	public function getDisplayOrder(): int
	{
		return 52;
	}

	/**
	 * @return array|string[]
	 */
	public function getRelatedPhraseGroups(): array
	{
		return ['dbtech_upgrades_coupon_title'];
	}

	/**
	 * @return bool
	 */
	public function isSearchable(): bool
	{
		return \XF::visitor()->hasAdminPermission('userUpgrade');
	}
}