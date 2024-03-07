<?php

namespace DBTech\UserUpgradeCoupon\Permission;

use XF\Permission\FlatContentPermissions;

/**
 * Class CouponPermissions
 *
 * @package DBTech\UserUpgradeCoupon\Permission
 */
class CouponPermissions extends FlatContentPermissions
{
	/**
	 * @return string
	 */
	protected function getContentType(): string
	{
		return 'dbtech_upgrade_coupon';
	}
	
	/**
	 * @return \XF\Phrase
	 */
	public function getAnalysisTypeTitle(): \XF\Phrase
	{
		return \XF::phrase('dbtech_user_upgrade_coupon_permissions');
	}
	
	/**
	 * @return \XF\Mvc\Entity\ArrayCollection
	 */
	public function getContentList(): \XF\Mvc\Entity\ArrayCollection
	{
		/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $entryRepo */
		$entryRepo = $this->builder->em()->getRepository('DBTech\UserUpgradeCoupon:Coupon');
		return $entryRepo->findEntriesForPermissionList()->fetch();
	}
	
	/**
	 * @param \XF\Entity\Permission $permission
	 *
	 * @return bool
	 */
	public function isValidPermission(\XF\Entity\Permission $permission): bool
	{
		return ($permission->permission_group_id == 'dbtechUserUpgrade' && $permission->permission_id == 'useCoupons');
	}
	
	/**
	 * @param $contentId
	 * @param array $calculated
	 * @param array $childPerms
	 *
	 * @return array
	 */
	protected function getFinalPerms($contentId, array $calculated, array &$childPerms): array
	{
		if (!isset($calculated['dbtechUserUpgrade']))
		{
			$calculated['dbtechUserUpgrade'] = [];
		}
		
		$final = $this->builder->finalizePermissionValues($calculated['dbtechUserUpgrade']);
		
		if (empty($final['useCoupons']))
		{
			$childPerms['dbtechUserUpgrade']['useCoupons'] = 'deny';
		}
		
		return $final;
	}
	
	/**
	 * @param $contentId
	 * @param array $calculated
	 * @param array $childPerms
	 *
	 * @return array
	 */
	/**
	 * @param $contentId
	 * @param array $calculated
	 * @param array $childPerms
	 *
	 * @return array
	 */
	protected function getFinalAnalysisPerms($contentId, array $calculated, array &$childPerms): array
	{
		$final = $this->builder->finalizePermissionValues($calculated);
		
		if (empty($final['dbtechUserUpgrade']['useCoupons']))
		{
			$childPerms['dbtechUserUpgrade']['useCoupons'] = 'deny';
		}
		
		return $final;
	}
}