<?php

namespace DBTech\UserUpgradeCoupon\ControllerPlugin;

use XF\ControllerPlugin\AbstractPermission;

/**
 * Class CouponPermission
 *
 * @package DBTech\UserUpgradeCoupon\ControllerPlugin
 */
class CouponPermission extends AbstractPermission
{
	/**
	 * @var string
	 */
	protected $viewFormatter = 'DBTech\UserUpgradeCoupon:Permission\Coupon%s';

	/**
	 * @var string
	 */
	protected $templateFormatter = 'dbtech_upgrade_permission_coupon_%s';

	/**
	 * @var string
	 */
	protected $routePrefix = 'permissions/dbtech-upgrade-coupons';

	/**
	 * @var string
	 */
	protected $contentType = 'dbtech_upgrade_coupon';

	/**
	 * @var string
	 */
	protected $entityIdentifier = 'DBTech\UserUpgradeCoupon:Coupon';

	/**
	 * @var string
	 */
	protected $primaryKey = 'coupon_id';

	/**
	 * @var string
	 */
	protected $privatePermissionGroupId = 'dbtechUserUpgrade';

	/**
	 * @var string
	 */
	protected $privatePermissionId = 'useCoupons';
}