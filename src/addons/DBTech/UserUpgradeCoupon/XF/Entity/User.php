<?php /** @noinspection PhpMissingReturnTypeInspection */

namespace DBTech\UserUpgradeCoupon\XF\Entity;

/**
 * Class User
 * @package DBTech\UserUpgradeCoupon\XF\Entity
 */
class User extends XFCP_User
{
	/**
	 * @param int $contentId
	 * @param string $permission
	 *
	 * @return bool
	 */
	public function hasDbtechUserUpgradeCouponPermission(int $contentId, string $permission)
	{
		return $this->PermissionSet->hasContentPermission('dbtech_upgrade_coupon', $contentId, $permission);
	}
	
	/**
	 * @param array|null $couponIds
	 */
	public function cacheDbtechUserUpgradeCouponPermissions(array $couponIds = null)
	{
		if (is_array($couponIds))
		{
			\XF::permissionCache()->cacheContentPermsByIds($this->permission_combination_id, 'dbtech_upgrade_coupon', $couponIds);
		}
		else
		{
			\XF::permissionCache()->cacheAllContentPerms($this->permission_combination_id, 'dbtech_upgrade_coupon');
		}
	}
	
	/**
	 *
	 */
	protected function _postSave()
	{
		parent::_postSave();
		
		if ($this->isInsert())
		{
			$trial = $this->app()->options()->dbtechUserUpgradeCouponsUserGroupTrial;
			
			if ($trial['enabled']
				&& $trial['user_group_id']
				&& $trial['trial_length_amount']
				&& $trial['trial_length_unit']
			) {
				\XF::runOnce('dbtechUserCouponTrial', function () use ($trial)
				{
					$groupEnd = strtotime("+{$trial['trial_length_amount']} {$trial['trial_length_unit']}");
					$groupEnd = min(pow(2, 32) - 1, $groupEnd);
					
					/** @var \XF\Service\User\TempChange $changeService */
					$changeService = $this->app()->service('XF:User\TempChange');
					$changeService->applyGroupChange(
						$this,
						'dbtechUserCouponTrial-' . $this->user_id,
						[$trial['user_group_id']],
						'dbtechUserCouponTrial-' . $this->user_id,
						$groupEnd
					);
				});
			}
		}
	}
}