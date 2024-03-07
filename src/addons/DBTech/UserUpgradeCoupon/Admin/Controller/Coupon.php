<?php

namespace DBTech\UserUpgradeCoupon\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;

/**
 * Class Coupon
 * @package DBTech\UserUpgradeCoupon\Admin\Controller
 */
class Coupon extends AbstractController
{
	/**
	 * @param $action
	 * @param ParameterBag $params
	 * @throws \XF\Mvc\Reply\Exception
	 */
	protected function preDispatchController($action, ParameterBag $params)
	{
		$this->assertAdminPermission('userUpgrade');
	}

	/**
	 * @return \XF\Mvc\Reply\View
	 */
	public function actionIndex(): \XF\Mvc\Reply\View
	{
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
		return $this->view('DBTech\UserUpgradeCoupon:Coupon\Listing', 'dbtech_user_upgrade_coupon_list', $viewParams);
	}

	/**
	 * @param \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon
	 * @return \XF\Mvc\Reply\View
	 */
	protected function couponAddEdit(\DBTech\UserUpgradeCoupon\Entity\Coupon $coupon): \XF\Mvc\Reply\View
	{
		$upgradeRepo = $this->getUserUpgradeRepo();
		
		$viewParams = [
			'coupon' => $coupon,
			'userUpgrades' => $upgradeRepo->findUserUpgradesForList()->fetch(),
			'nextCounter' => count($coupon->user_upgrade_discounts),
		];
		return $this->view('DBTech\UserUpgradeCoupon:Coupon\Edit', 'dbtech_user_upgrade_coupon_edit', $viewParams);
	}

	/**
	 * @param ParameterBag $params
	 * @return \XF\Mvc\Reply\View
	 * @throws \XF\Mvc\Reply\Exception
	 */
	public function actionEdit(ParameterBag $params): \XF\Mvc\Reply\View
	{
		/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
		$coupon = $this->assertCouponExists($params->coupon_id);
		return $this->couponAddEdit($coupon);
	}
	
	/**
	 * @return \DBTech\UserUpgradeCoupon\Service\Coupon\Create
	 * @throws \Exception
	 */
	protected function setupCouponCreate(): \DBTech\UserUpgradeCoupon\Service\Coupon\Create
	{
		/** @var \DBTech\UserUpgradeCoupon\Service\Coupon\Create $creator */
		$creator = $this->service('DBTech\UserUpgradeCoupon:Coupon\Create');
		
		$bulkInput = $this->filter([
			'coupon_code' => 'str',
			'coupon_type' => 'str',
			'coupon_percent' => 'float',
			'coupon_value' => 'float',
			'remaining_uses' => 'int',
		]);
		$creator->getCoupon()->bulkSet($bulkInput);
		
		$creator->setTitle($this->filter('title', 'str'));
		
		$dateInput = $this->filter([
			'start_date' => 'datetime',
			'start_time' => 'str'
		]);
		$creator->setStartDate($dateInput['start_date'], $dateInput['start_time']);
		
		$dateInput = $this->filter([
			'length_amount' => 'uint',
			'length_unit' => 'str',
		]);
		$creator->setDuration($dateInput['length_amount'], $dateInput['length_unit']);
		
		$discounts = [];
		$args = $this->filter('user_upgrade_discounts', 'array');
		foreach ($args AS $arg)
		{
			if (empty($arg['user_upgrade_id']))
			{
				continue;
			}
			$discounts[] = $this->filterArray($arg, [
				'user_upgrade_id' => 'uint',
				'upgrade_value' => 'float',
			]);
		}
		
		$creator->setUpgradeDiscounts($discounts);
		
		return $creator;
	}
	
	/**
	 * @param \DBTech\UserUpgradeCoupon\Service\Coupon\Create $creator
	 */
	protected function finalizeCouponCreate(\DBTech\UserUpgradeCoupon\Service\Coupon\Create $creator)
	{
	}
	
	/**
	 * @return \XF\Mvc\Reply\View
	 * @throws \XF\Mvc\Reply\Exception
	 */
	public function actionAdd(): \XF\Mvc\Reply\View
	{
		$upgradeRepo = $this->getUserUpgradeRepo();
		if (!$upgradeRepo->findUserUpgradesForList()->total())
		{
			throw $this->exception($this->error(\XF::phrase('dbtech_user_upgrade_please_create_at_least_one_upgrade_before_continuing')));
		}
		
		$copyCouponId = $this->filter('source_coupon_id', 'uint');
		if ($copyCouponId)
		{
			$copyCoupon = $this->assertCouponExists($copyCouponId)->toArray(false);
			foreach ([
				'coupon_id'
			] as $key)
			{
				unset($copyCoupon[$key]);
			}
			
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = $this->em()->create('DBTech\UserUpgradeCoupon:Coupon');
			$coupon->bulkSet($copyCoupon);
		}
		else
		{
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = $this->em()->create('DBTech\UserUpgradeCoupon:Coupon');
		}
		
		return $this->couponAddEdit($coupon);
	}
	
	/**
	 * @param \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon
	 *
	 * @return \DBTech\UserUpgradeCoupon\Service\Coupon\Edit
	 * @throws \Exception
	 */
	protected function setupCouponEdit(\DBTech\UserUpgradeCoupon\Entity\Coupon $coupon): \DBTech\UserUpgradeCoupon\Service\Coupon\Edit
	{
		/** @var \DBTech\UserUpgradeCoupon\Service\Coupon\Edit $editor */
		$editor = $this->service('DBTech\UserUpgradeCoupon:Coupon\Edit', $coupon);
		
		$bulkInput = $this->filter([
			'coupon_code' => 'str',
			'coupon_type' => 'str',
			'coupon_percent' => 'float',
			'coupon_value' => 'float',
			'remaining_uses' => 'int',
		]);
		$editor->getCoupon()->bulkSet($bulkInput);
		
		$editor->setTitle($this->filter('title', 'str'));
		
		$dateInput = $this->filter([
			'start_date' => 'datetime',
			'start_time' => 'str'
		]);
		$editor->setStartDate($dateInput['start_date'], $dateInput['start_time']);
		
		$dateInput = $this->filter([
			'expiry_date' => 'datetime',
			'expiry_time' => 'str'
		]);
		$editor->setExpiryDate($dateInput['expiry_date'], $dateInput['expiry_time']);
		
		$discounts = [];
		$args = $this->filter('user_upgrade_discounts', 'array');
		
		foreach ($args AS $arg)
		{
			if (empty($arg['user_upgrade_id']))
			{
				continue;
			}
			$discounts[] = $this->filterArray($arg, [
				'user_upgrade_id' => 'uint',
				'upgrade_value' => 'float',
			]);
		}
		
		$editor->setUpgradeDiscounts($discounts);
		
		return $editor;
	}
	
	/**
	 * @param \DBTech\UserUpgradeCoupon\Service\Coupon\Edit $editor
	 */
	protected function finalizeCouponEdit(\DBTech\UserUpgradeCoupon\Service\Coupon\Edit $editor)
	{
	}

	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\Error|\XF\Mvc\Reply\Redirect
	 * @throws \LogicException
	 * @throws \XF\Mvc\Reply\Exception
	 * @throws \Exception
	 */
	public function actionSave(ParameterBag $params)
	{
		$this->assertPostOnly();
		
		if ($params->coupon_id)
		{
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = $this->assertCouponExists($params->coupon_id);
			
			/** @var \DBTech\UserUpgradeCoupon\Service\Coupon\Edit $editor */
			$editor = $this->setupCouponEdit($coupon);
			//			$editor->checkForSpam();
			
			if (!$editor->validate($errors))
			{
				return $this->error($errors);
			}
			$editor->save();
			$this->finalizeCouponEdit($editor);
		}
		else
		{
			/** @var \DBTech\UserUpgradeCoupon\Service\Coupon\Create $creator */
			$creator = $this->setupCouponCreate();
			//			$creator->checkForSpam();
			
			if (!$creator->validate($errors))
			{
				throw $this->exception($this->error($errors));
			}
			
			/** @var \DBTech\UserUpgradeCoupon\Entity\Coupon $coupon */
			$coupon = $creator->save();
			$this->finalizeCouponCreate($creator);
		}


		return $this->redirect($this->buildLink('dbtech-upgrades/coupons') . $this->buildLinkHash($coupon->coupon_id));
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\Redirect|\XF\Mvc\Reply\View
	 * @throws \InvalidArgumentException
	 * @throws \LogicException
	 * @throws \Exception
	 * @throws \XF\Mvc\Reply\Exception
	 */
	public function actionDelete(ParameterBag $params)
	{
		$coupon = $this->assertCouponExists($params->coupon_id);
		
		/** @var \DBTech\UserUpgradeCoupon\ControllerPlugin\Delete $plugin */
		$plugin = $this->plugin('DBTech\UserUpgradeCoupon:Delete');
		return $plugin->actionDeleteWithState(
			$coupon,
			'coupon_state',
			'DBTech\UserUpgradeCoupon:Coupon\Delete',
			'dbtech_upgrade_coupon',
			$this->buildLink('dbtech-upgrades/coupons/delete', $coupon),
			$this->buildLink('dbtech-upgrades/coupons/edit', $coupon),
			$this->buildLink('dbtech-upgrades/coupons'),
			$coupon->title,
			true,
			false
		);
	}
	
	/**
	 * @return \DBTech\UserUpgradeCoupon\ControllerPlugin\CouponPermission
	 */
	protected function getCouponPermissionPlugin(): \DBTech\UserUpgradeCoupon\ControllerPlugin\CouponPermission
	{
		/** @var \DBTech\UserUpgradeCoupon\ControllerPlugin\CouponPermission $plugin */
		$plugin = $this->plugin('DBTech\UserUpgradeCoupon:CouponPermission');
		$plugin->setFormatters('DBTech\UserUpgradeCoupon:Coupon\Permission%s', 'dbtech_user_upgrade_coupon_permission_%s');
		$plugin->setRoutePrefix('dbtech-upgrades/coupons/permissions');
		
		return $plugin;
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\View
	 */
	public function actionPermissions(ParameterBag $params): \XF\Mvc\Reply\View
	{
		return $this->getCouponPermissionPlugin()->actionList($params);
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\AbstractReply|\XF\Mvc\Reply\Redirect|\XF\Mvc\Reply\View
	 */
	public function actionPermissionsEdit(ParameterBag $params)
	{
		return $this->getCouponPermissionPlugin()->actionEdit($params);
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\Redirect
	 */
	public function actionPermissionsSave(ParameterBag $params): \XF\Mvc\Reply\Redirect
	{
		return $this->getCouponPermissionPlugin()->actionSave($params);
	}
	
	/**
	 * @param int $id
	 * @param null $with
	 * @param null $phraseKey
	 *
	 * @return \DBTech\UserUpgradeCoupon\Entity\Coupon
	 * @throws \XF\Mvc\Reply\Exception
	 */
	protected function assertCouponExists(int $id, $with = null, $phraseKey = null): \DBTech\UserUpgradeCoupon\Entity\Coupon
	{
		return $this->assertRecordExists('DBTech\UserUpgradeCoupon:Coupon', $id, $with, $phraseKey);
	}

	/**
	 * @return \DBTech\UserUpgradeCoupon\Repository\Coupon|\XF\Mvc\Entity\Repository
	 */
	protected function getCouponRepo()
	{
		return $this->repository('DBTech\UserUpgradeCoupon:Coupon');
	}
	
	/**
	 * @return \XF\Repository\UserUpgrade|\XF\Mvc\Entity\Repository
	 */
	protected function getUserUpgradeRepo()
	{
		return $this->repository('XF:UserUpgrade');
	}
}