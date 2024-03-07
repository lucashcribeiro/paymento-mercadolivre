<?php

namespace DBTech\eCommerce\EmailStop;

use XF\EmailStop\AbstractHandler;

/**
 * Class Category
 *
 * @package DBTech\eCommerce\EmailStop
 */
class Category extends AbstractHandler
{
	/**
	 * @param \XF\Entity\User $user
	 * @param $contentId
	 *
	 * @return null|\XF\Phrase
	 * @throws \Exception
	 */
	public function getStopOneText(\XF\Entity\User $user, $contentId): ?\XF\Phrase
	{
		/** @var \DBTech\eCommerce\Entity\Category|null $category */
		$category = \XF::em()->find('DBTech\eCommerce:Category', $contentId);
		$canView = \XF::asVisitor(
			$user,
			function () use ($category): bool { return $category && $category->canView(); }
		);

		if ($canView)
		{
			return \XF::phrase('stop_notification_emails_from_x', ['title' => $category->title]);
		}
		
		return null;
	}
	
	/**
	 * @param \XF\Entity\User $user
	 *
	 * @return \XF\Phrase
	 */
	public function getStopAllText(\XF\Entity\User $user): \XF\Phrase
	{
		return \XF::phrase('stop_notification_emails_from_all_categories');
	}
	
	/**
	 * @param \XF\Entity\User $user
	 * @param $contentId
	 *
	 * @throws \LogicException
	 * @throws \InvalidArgumentException
	 * @throws \Exception
	 * @throws \XF\PrintableException
	 */
	public function stopOne(\XF\Entity\User $user, $contentId)
	{
		/** @var \DBTech\eCommerce\Entity\Category $category */
		$category = \XF::em()->find('DBTech\eCommerce:Category', $contentId);
		if ($category)
		{
			/** @var \DBTech\eCommerce\Repository\CategoryWatch $categoryWatchRepo */
			$categoryWatchRepo = \XF::repository('DBTech\eCommerce:CategoryWatch');
			$categoryWatchRepo->setWatchState($category, $user, 'update', ['email_subscribe' => false]);
		}
	}
	
	/**
	 * @param \XF\Entity\User $user
	 *
	 * @throws \InvalidArgumentException
	 */
	public function stopAll(\XF\Entity\User $user)
	{
		/** @var \DBTech\eCommerce\Repository\ProductWatch $productWatchRepo */
		$productWatchRepo = \XF::repository('DBTech\eCommerce:ProductWatch');
		$productWatchRepo->setWatchStateForAll($user, 'update', ['email_subscribe' => 0]);

		/** @var \DBTech\eCommerce\Repository\CategoryWatch $categoryWatchRepo */
		$categoryWatchRepo = \XF::repository('DBTech\eCommerce:CategoryWatch');
		$categoryWatchRepo->setWatchStateForAll($user, 'update', ['send_email' => 0]);
	}
}