<?php /** @noinspection PhpMissingReturnTypeInspection */

namespace DBTech\UserUpgradeCoupon\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

/**
 * Class Purchase
 *
 * @package DBTech\UserUpgradeCoupon\XF\Pub\Controller
 */
class Purchase extends XFCP_Purchase
{
	/**
	 * @return \XF\Mvc\Reply\Redirect
	 * @throws \XF\Mvc\Reply\Exception
	 */
	public function actionApplyCoupon()
	{
		$couponCode = $this->request->filter('coupon_code', 'str');
		if ($couponCode)
		{
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = \XF::finder('DBTech\UserUpgradeCoupon:Coupon')
				->where('coupon_code', $couponCode)
				->isValid()
				->order('expiry_date', 'DESC')
				->fetchOne()
			;
			if (!$coupon)
			{
				throw $this->exception($this->error(\XF::phrase('dbtech_user_upgrade_coupon_could_not_be_found')));
			}
			
			if (!$coupon->canUse())
			{
				throw $this->exception($this->error(\XF::phrase('dbtech_user_upgrade_coupon_could_not_be_applied')));
			}
			
			$this->app->response()
				->setCookie('dbtech_user_upgrade_coupon', $coupon->coupon_id, 86400 * 365)
			;
		}
		else
		{
			$this->app->response()
				->setCookie('dbtech_user_upgrade_coupon', false)
			;
		}
		
		return $this->redirect($this->buildLink('account/upgrades'));
	}

	/**
	 * @param \XF\Mvc\ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\Error|\XF\Mvc\Reply\Redirect
	 * @throws \XF\Db\Exception
	 * @throws \XF\Mvc\Reply\Exception
	 */
	public function actionFreeUserUpgrade(ParameterBag $params)
	{
		$purchasable = $this->assertPurchasableExists($params->purchasable_type_id);
		
		if (!$purchasable->isActive() || $params->purchasable_type_id != 'user_upgrade')
		{
			throw $this->exception($this->error(\XF::phrase('items_of_this_type_cannot_be_purchased_at_moment')));
		}
		
		$userUpgradeId = $this->filter('user_upgrade_id', 'uint');
		$userUpgrade = \XF::em()->find('XF:UserUpgrade', $userUpgradeId);
		if (!$userUpgrade || !$userUpgrade->canPurchase())
		{
			return $this->error(\XF::phrase('this_item_cannot_be_purchased_at_moment'));
		}
		
		$userUpgrade = \XF::em()->find(
			'XF:UserUpgrade',
			$userUpgradeId,
			'Active|' . \XF::visitor()->user_id
		);

		if (!$userUpgrade->isFreeAfterCoupon())
		{
			return $this->error(\XF::phrase('this_item_cannot_be_purchased_at_moment'));
		}

		/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $couponRepo */
		$couponRepo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
		$coupon = $couponRepo->getCouponFromCookie();

		if ($coupon->remaining_uses > 0)
		{
			\XF::db()->query('
				UPDATE xf_dbtech_user_upgrade_coupon
				SET remaining_uses = IF(remaining_uses > 0, remaining_uses - 1, 0)
				WHERE coupon_id = ?
			', $coupon->coupon_id);
		}

		/** @var \XF\Service\User\Upgrade $upgradeService */
		$upgradeService = \XF::app()->service('XF:User\Upgrade', $userUpgrade, \XF::visitor());
		$upgradeService->upgrade();
		
		return $this->redirect($this->buildLink('account/upgrades'));
	}
}