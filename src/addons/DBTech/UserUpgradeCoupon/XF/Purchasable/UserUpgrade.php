<?php /** @noinspection PhpMissingReturnTypeInspection */

namespace DBTech\UserUpgradeCoupon\XF\Purchasable;

use XF\Payment\CallbackState;

/**
 * Class UserUpgrade
 *
 * @package DBTech\UserUpgradeCoupon\XF\Purchasable
 */
class UserUpgrade extends XFCP_UserUpgrade
{
	/**
	 * @param \XF\Http\Request $request
	 * @param \XF\Entity\User $purchaser
	 * @param null $error
	 *
	 * @return bool|\XF\Purchasable\Purchase
	 */
	public function getPurchaseFromRequest(\XF\Http\Request $request, \XF\Entity\User $purchaser, &$error = null)
	{
		/** @var \DBTech\UserUpgradeCoupon\XF\Entity\UserUpgrade $userUpgrade */
		$userUpgradeId = $request->filter('user_upgrade_id', 'uint');
		$userUpgrade = \XF::em()->find('XF:UserUpgrade', $userUpgradeId);
		
		/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $couponRepo */
		$couponRepo = \XF::repository('DBTech\UserUpgradeCoupon:Coupon');
		$coupon = $couponRepo->getCouponFromCookie();
		
		if (!$coupon || !$coupon->canUse() || !$coupon->isApplicable($userUpgrade))
		{
			return parent::getPurchaseFromRequest($request, $purchaser, $error);
		}
		
		$purchaseObject = parent::getPurchaseFromRequest($request, $purchaser, $error);
		if (!$purchaseObject)
		{
			return $purchaseObject;
		}
		
		$extraData = $purchaseObject->extraData;
		$extraData['dbtech_user_upgrade_coupon_id'] = $coupon->coupon_id;
		
		$purchaseObject->extraData = $extraData;
		
		$purchaseObject->cost = $coupon->getDiscountedCost($userUpgrade, $purchaseObject->cost);
		
		return $purchaseObject;
	}
	
	/**
	 * @param array $extraData
	 * @param \XF\Entity\PaymentProfile $paymentProfile
	 * @param \XF\Entity\User $purchaser
	 * @param null $error
	 *
	 * @return bool|\XF\Purchasable\Purchase
	 */
	public function getPurchaseFromExtraData(array $extraData, \XF\Entity\PaymentProfile $paymentProfile, \XF\Entity\User $purchaser, &$error = null)
	{
		$purchaseObject = parent::getPurchaseFromExtraData($extraData, $paymentProfile, $purchaser, $error);
		
		if ($purchaseObject && !empty($extraData['dbtech_user_upgrade_coupon_id']))
		{
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = \XF::em()->find('DBTech\UserUpgradeCoupon:Coupon', $extraData['dbtech_user_upgrade_coupon_id']);
			if ($coupon)
			{
				$newData = $purchaseObject->extraData;
				$newData['dbtech_user_upgrade_coupon_id'] = $extraData['dbtech_user_upgrade_coupon_id'];
				
				$purchaseObject->extraData = $newData;
				
				$purchasable = $this->getPurchasableFromExtraData($extraData);
				$purchaseObject->cost = $coupon->getDiscountedCost($purchasable['purchasable'], $purchaseObject->cost);
			}
		}
		
		return $purchaseObject;
	}
	
	/**
	 * @param CallbackState $state
	 *
	 * @return void
	 * @throws \XF\Db\Exception
	 * @throws \XF\PrintableException
	 */
	public function completePurchase(CallbackState $state)
	{
		if (!$state->legacy)
		{
			$purchaseRequest = $state->getPurchaseRequest();
			if (empty($purchaseRequest->extra_data['dbtech_user_upgrade_coupon_id']))
			{
				parent::completePurchase($state);
				return;
			}
			
			$couponId = $purchaseRequest->extra_data['dbtech_user_upgrade_coupon_id'];
			
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = \XF::em()->find('DBTech\UserUpgradeCoupon:Coupon', $couponId);
			if ($coupon)
			{
				$userUpgradeId = $purchaseRequest->extra_data['user_upgrade_id'];
				$userUpgradeRecordId = isset($purchaseRequest->extra_data['user_upgrade_record_id'])
					? $purchaseRequest->extra_data['user_upgrade_record_id']
					: null;
				
				$paymentResult = $state->paymentResult;
				$purchaser = $state->getPurchaser();
				
				/** @var \XF\Entity\UserUpgrade $userUpgrade */
				$userUpgrade = \XF::em()->find('XF:UserUpgrade', $userUpgradeId);
				
				// Ensure this gets saved into the user upgrade active record
				if (!$state->extraData || !is_array($state->extraData))
				{
					$state->extraData = [];
				}
				
				$newData = $state->extraData;
				$newData['dbtech_user_upgrade_coupon_id'] = $couponId;
				$newData['cost_amount'] = $coupon->getDiscountedCost($userUpgrade, $userUpgrade->cost_amount);
				
				$state->extraData = $newData;
				
				switch ($paymentResult)
				{
					case CallbackState::PAYMENT_RECEIVED:
						if (!$userUpgradeRecordId && $coupon->remaining_uses > 0)
						{
							\XF::db()->query('
								UPDATE xf_dbtech_user_upgrade_coupon
								SET remaining_uses = IF(remaining_uses > 0, remaining_uses - 1, 0)
								WHERE coupon_id = ?
							', $coupon->coupon_id);
						}
						
						/** @var \DBTech\UserUpgradeCoupon\Entity\CouponLog $couponLog */
						$couponLog = \XF::em()->create('DBTech\UserUpgradeCoupon:CouponLog');
						$couponLog->user_upgrade_id = $userUpgradeId;
						$couponLog->coupon_id = $coupon->coupon_id;
						$couponLog->coupon_discounts = $userUpgrade->cost_amount - $coupon->getDiscountedCost($userUpgrade, $userUpgrade->cost_amount);
						$couponLog->currency = $userUpgrade->cost_currency;
						$couponLog->user_id = $purchaser->user_id;
						$couponLog->save();
						break;
				}
			}
		}
		
		parent::completePurchase($state);
	}
}