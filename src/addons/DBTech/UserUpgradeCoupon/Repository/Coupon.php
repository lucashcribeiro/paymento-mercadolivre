<?php

namespace DBTech\UserUpgradeCoupon\Repository;

use DBTech\UserUpgradeCoupon\Entity\UpgradeCouponValue;
use XF\Mvc\Entity\Repository;

/**
 * Class Coupon
 * @package DBTech\UserUpgradeCoupon\Repository
 */
class Coupon extends Repository
{
	/**
	 * @return \DBTech\UserUpgradeCoupon\Finder\Coupon|\XF\Mvc\Entity\Finder
	 */
	public function findCouponsForList()
	{
		return $this->finder('DBTech\UserUpgradeCoupon:Coupon')->order([['expiry_date', 'DESC'], ['start_date', 'DESC']], 'DESC');
	}

	/**
	 * @return \DBTech\UserUpgradeCoupon\Finder\Coupon|\XF\Mvc\Entity\Finder
	 */
	public function findEntriesForPermissionList()
	{
		return $this->findCouponsForList();
	}
	
	/**
	 * @return \DBTech\UserUpgradeCoupon\Entity\Coupon|null
	 */
	public function getCouponFromCookie(): ?\DBTech\UserUpgradeCoupon\Entity\Coupon
	{
		$coupon = null;
		
		$couponId = $this->app()->request()->getCookie('dbtech_user_upgrade_coupon');
		if ($couponId)
		{
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = $this->em->find('DBTech\UserUpgradeCoupon:Coupon', $couponId);
		}
		
		return $coupon;
	}
	
	/**
	 * @param \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon
	 * @param string $action
	 * @param string $reason
	 * @param array $extra
	 * @param \XF\Entity\User|null $forceUser
	 *
	 * @return bool
	 */
	public function sendModeratorActionAlert(
		\DBTech\UserUpgradeCoupon\Entity\Coupon $coupon,
		string $action,
		string $reason = '',
		array $extra = [],
		\XF\Entity\User $forceUser = null
	): bool {
		if (!$forceUser)
		{
			return false;
		}
		
		$extra = array_merge([
			'title' => $coupon->title,
			'reason' => $reason,
			'depends_on_addon_id' => 'DBTech/UserUpgradeCoupon',
		], $extra);
		
		/** @var \XF\Repository\UserAlert $alertRepo */
		$alertRepo = $this->repository('XF:UserAlert');
		$alertRepo->alert(
			$forceUser,
			0,
			'',
			'user',
			$forceUser->user_id,
			"dbt_upgr_coupon_{$action}",
			$extra
		);
		
		return true;
	}
	
	/**
	 * @param int $couponId
	 * @param array $couponInfo
	 *
	 * @throws \InvalidArgumentException
	 */
	public function updateContentAssociations(int $couponId, array $couponInfo): void
	{
		$db = $this->db();
		$db->beginTransaction();
		
		$db->delete('xf_dbtech_user_upgrade_coupon_value', 'coupon_id = ?', $couponId);
		
		$map = [];
		
		foreach ($couponInfo AS $info)
		{
			$map[] = [
				'coupon_id' => $couponId,
				'user_upgrade_id' => $info['user_upgrade_id'],
				'upgrade_value' => $info['upgrade_value']
			];
		}
		
		if ($map)
		{
			$db->insertBulk('xf_dbtech_user_upgrade_coupon_value', $map, false, false, 'IGNORE');
		}
		
		$this->rebuildContentAssociationCache([$couponId]);
		
		$db->commit();
	}
	
	/**
	 * @param array $couponIds
	 */
	public function rebuildContentAssociationCache(array $couponIds): void
	{
		if (!$couponIds)
		{
			return;
		}
		
		$newCache = [];
		
		$couponAssociations = $this->finder('DBTech\UserUpgradeCoupon:UpgradeCouponValue')
			->where('coupon_id', $couponIds);
		
		/** @var UpgradeCouponValue $couponValue */
		foreach ($couponAssociations->fetch() AS $couponValue)
		{
			$newCache[$couponValue->coupon_id][] = $couponValue->toArray();
		}
		
		foreach ($couponIds AS $couponId)
		{
			if (!isset($newCache[$couponId]))
			{
				$newCache[$couponId] = [];
			}
		}
		
		$this->updateAssociationCache($newCache);
	}
	
	/**
	 * @param array $cache
	 */
	protected function updateAssociationCache(array $cache): void
	{
		$couponIds = array_keys($cache);
		$coupons = $this->em->findByIds('DBTech\UserUpgradeCoupon:Coupon', $couponIds);
		
		foreach ($coupons AS $coupon)
		{
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon->user_upgrade_discounts = $cache[$coupon->coupon_id];
			$coupon->saveIfChanged();
		}
	}
}