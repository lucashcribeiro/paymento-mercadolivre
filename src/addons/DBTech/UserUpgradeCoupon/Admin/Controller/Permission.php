<?php

namespace DBTech\UserUpgradeCoupon\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;

/**
 * Class Permission
 *
 * @package DBTech\UserUpgradeCoupon\Admin\Controller
 */
class Permission extends AbstractController
{
	/**
	 * @param $action
	 * @param ParameterBag $params
	 *
	 * @throws \XF\Mvc\Reply\Exception
	 */
	protected function preDispatchController($action, ParameterBag $params)
	{
		$this->assertAdminPermission('userUpgrade');
	}

	/**
	 * @return \DBTech\UserUpgradeCoupon\ControllerPlugin\CouponPermission
	 */
	protected function getCouponPermissionPlugin(): \DBTech\UserUpgradeCoupon\ControllerPlugin\CouponPermission
	{
		/** @var \DBTech\UserUpgradeCoupon\ControllerPlugin\CouponPermission $plugin */
		$plugin = $this->plugin('DBTech\UserUpgradeCoupon:CouponPermission');
		$plugin->setFormatters('DBTech\UserUpgradeCoupon\Permission\Coupon%s', 'dbtech_user_upgrade_permission_coupon_%s');
		$plugin->setRoutePrefix('permissions/dbtech-upgrade-coupons');
		
		return $plugin;
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\View
	 */
	public function actionCoupon(ParameterBag $params): \XF\Mvc\Reply\View
	{
		if ($params->coupon_id)
		{
			return $this->getCouponPermissionPlugin()->actionList($params);
		}
		
		/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $couponRepo */
		$couponRepo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
		$coupons = $couponRepo->findCouponsForList()->fetch();
		
		/** @var \XF\Repository\PermissionEntry $permissionEntryRepo */
		$permissionEntryRepo = $this->repository('XF:PermissionEntry');
		$customPermissions = $permissionEntryRepo->getContentWithCustomPermissions('dbtech_upgrade_coupon');
		
		$viewParams = [
			'coupons' => $coupons,
			'customPermissions' => $customPermissions
		];
		return $this->view('DBTech\UserUpgradeCoupon:Permission\CouponOverview', 'dbtech_user_upgrade_permission_coupon_overview', $viewParams);
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\AbstractReply|\XF\Mvc\Reply\Redirect|\XF\Mvc\Reply\View
	 */
	public function actionCouponEdit(ParameterBag $params)
	{
		return $this->getCouponPermissionPlugin()->actionEdit($params);
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\Redirect
	 */
	public function actionCouponSave(ParameterBag $params): \XF\Mvc\Reply\Redirect
	{
		return $this->getCouponPermissionPlugin()->actionSave($params);
	}
}