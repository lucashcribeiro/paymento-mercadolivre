<?php

namespace DBTech\UserUpgradeCoupon\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;

/**
 * Class Log
 * @package DBTech\UserUpgradeCoupon\Admin\Controller
 */
class Log extends AbstractController
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
		return $this->view('DBTech\UserUpgradeCoupon:Log', 'dbtech_user_upgrade_logs');
	}
	
	/**
	 * @param ParameterBag $params
	 *
	 * @return \XF\Mvc\Reply\View
	 * @throws \XF\Mvc\Reply\Exception
	 */
	public function actionCoupon(ParameterBag $params): \XF\Mvc\Reply\View
	{
		if ($params->coupon_log_id)
		{
			$entry = $this->assertCouponLogExists($params->coupon_log_id, [
				'User',
				'Ip',
				'Upgrade'
			], 'requested_log_entry_not_found');
			
			$viewParams = [
				'entry' => $entry,
			];
			return $this->view('DBTech\UserUpgradeCoupon:Log\Coupon\View', 'dbtech_user_upgrade_log_coupon_view', $viewParams);
		}
		
		$criteria = $this->filter('criteria', 'array');
		$order = $this->filter('order', 'str');
		$direction = $this->filter('direction', 'str');

		$page = $this->filterPage();
		$perPage = 20;
		
		/** @var \DBTech\UserUpgradeCoupon\Searcher\CouponLog $searcher */
		$searcher = $this->searcher('DBTech\UserUpgradeCoupon:CouponLog', $criteria);

		if ($order && !$direction)
		{
			$direction = $searcher->getRecommendedOrderDirection($order);
		}

		$searcher->setOrder($order, $direction);

		$finder = $searcher->getFinder();
		$finder->limitByPage($page, $perPage);
		
		$finder->with('Ip');

		$total = $finder->total();
		$entries = $finder->fetch();

		$viewParams = [
			'entries' => $entries,

			'total' => $total,
			'page' => $page,
			'perPage' => $perPage,

			'criteria' => $searcher->getFilteredCriteria(),
			// 'filter' => $filter['text'],
			'sortOptions' => $searcher->getOrderOptions(),
			'order' => $order,
			'direction' => $direction

		];
		return $this->view('DBTech\UserUpgradeCoupon:Log\Coupon\Listing', 'dbtech_user_upgrade_log_coupon_list', $viewParams);
	}

	/**
	 * @return \XF\Mvc\Reply\View
	 */
	public function actionCouponSearch(): \XF\Mvc\Reply\View
	{
		$viewParams = $this->getCouponLogSearcherParams();

		return $this->view('DBTech\UserUpgradeCoupon:Log\Coupon\Search', 'dbtech_user_upgrade_log_coupon_search', $viewParams);
	}

	/**
	 * @param array $extraParams
	 * @return array
	 */
	protected function getCouponLogSearcherParams(array $extraParams = []): array
	{
		/** @var \DBTech\UserUpgradeCoupon\Searcher\CouponLog $searcher */
		$searcher = $this->searcher('DBTech\UserUpgradeCoupon:CouponLog');

		$viewParams = [
			'criteria' => $searcher->getFormCriteria(),
			'sortOrders' => $searcher->getOrderOptions()
		];
		return $viewParams + $searcher->getFormData() + $extraParams;
	}
	
	/**
	 * @param string $id
	 * @param array|string|null $with
	 * @param null|string $phraseKey
	 *
	 * @return \DBTech\UserUpgradeCoupon\Entity\CouponLog|\XF\Mvc\Entity\Entity
	 * @throws \XF\Mvc\Reply\Exception
	 */
	protected function assertCouponLogExists($id, $with = null, $phraseKey = null)
	{
		return $this->assertRecordExists('DBTech\UserUpgradeCoupon:CouponLog', $id, $with, $phraseKey);
	}
}