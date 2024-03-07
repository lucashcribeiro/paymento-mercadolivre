<?php

namespace DBTech\UserUpgradeCoupon\Service\Coupon;

use DBTech\UserUpgradeCoupon\Entity\Coupon;

/**
 * Class Edit
 *
 * @package DBTech\UserUpgradeCoupon\Service\Coupon
 */
class Edit extends \XF\Service\AbstractService
{
	use \XF\Service\ValidateAndSavableTrait;

	/**
	 * @var Coupon
	 */
	protected $coupon;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var array
	 */
	protected $upgradeDiscounts;

	/**
	 * @var bool
	 */
	protected $logIp = true;

	/**
	 * @var bool
	 */
	protected $performValidations = true;

	/**
	 * @var bool
	 */
	protected $alert = false;

	/**
	 * @var string
	 */
	protected $alertReason = '';


	/**
	 * Edit constructor.
	 *
	 * @param \XF\App $app
	 * @param Coupon $coupon
	 */
	public function __construct(\XF\App $app, Coupon $coupon)
	{
		parent::__construct($app);

		$this->coupon = $coupon;
	}

	/**
	 * @return Coupon
	 */
	public function getCoupon(): Coupon
	{
		return $this->coupon;
	}

	/**
	 * @param bool $perform
	 */
	public function setPerformValidations(bool $perform): void
	{
		$this->performValidations = $perform;
	}

	/**
	 * @return bool
	 */
	public function getPerformValidations(): bool
	{
		return $this->performValidations;
	}

	/**
	 *
	 */
	public function setIsAutomated(): void
	{
		$this->setPerformValidations(false);
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param int $date
	 * @param string $time
	 *
	 * @throws \Exception
	 */
	public function setStartDate(int $date, string $time): void
	{
		$coupon = $this->coupon;
		$language = \XF::language();
		
		$dateTime = new \DateTime('@' . $date);
		$dateTime->setTimezone($language->getTimeZone());

		if (!$time || strpos($time, ':') === false)
		{
			// We didn't have a valid time string
			$hours = $language->date($coupon->start_date, 'H');
			$minutes = $language->date($coupon->start_date, 'i');
		}
		else
		{
			[$hours, $minutes] = explode(':', $time);

			// Sanitise hours and minutes to a maximum of 23:59
			$hours = min((int)$hours, 23);
			$minutes = min((int)$minutes, 59);
		}

		// Finally set it
		$dateTime->setTime($hours, $minutes);

		$coupon->start_date = $dateTime->getTimestamp();
	}
	
	/**
	 * @param int $date
	 * @param string $time
	 *
	 * @throws \Exception
	 */
	public function setExpiryDate(int $date, string $time): void
	{
		$coupon = $this->coupon;
		$language = \XF::language();
		
		$dateTime = new \DateTime('@' . $date);
		$dateTime->setTimezone($language->getTimeZone());

		if (!$time || strpos($time, ':') === false)
		{
			// We didn't have a valid time string
			$hours = $language->date($coupon->expiry_date, 'H');
			$minutes = $language->date($coupon->expiry_date, 'i');
		}
		else
		{
			[$hours, $minutes] = explode(':', $time);

			// Sanitise hours and minutes to a maximum of 23:59
			$hours = min((int)$hours, 23);
			$minutes = min((int)$minutes, 59);
		}

		// Finally set it
		$dateTime->setTime($hours, $minutes);

		$coupon->expiry_date = $dateTime->getTimestamp();
	}

	/**
	 * @param array $discounts
	 */
	public function setUpgradeDiscounts(array $discounts): void
	{
		$this->upgradeDiscounts = $discounts;
	}

	/**
	 * @param bool $logIp
	 */
	public function logIp(bool $logIp): void
	{
		$this->logIp = $logIp;
	}

	/**
	 * @param bool $alert
	 * @param string $reason
	 */
	public function setSendAlert(bool $alert, string $reason = null): void
	{
		$this->alert = $alert;
		if ($reason !== null)
		{
			$this->alertReason = $reason;
		}
	}

	/**
	 *
	 */
	protected function finalSetup(): void
	{
	}

	/**
	 * @return array
	 */
	protected function _validate(): array
	{
		$this->finalSetup();

		$coupon = $this->coupon;

		$coupon->preSave();
		return $coupon->getErrors();
	}
	
	/**
	 * @return mixed
	 * @throws \LogicException
	 * @throws \Exception
	 * @throws \XF\PrintableException
	 */
	protected function _save(): Coupon
	{
		$coupon = $this->coupon;

		$this->beforeUpdate();

		$db = $this->db();
		$db->beginTransaction();

		$coupon->save(true, false);

		$this->afterUpdate();

		$db->commit();

		if ($this->alert && $coupon->isVisible())
		{
			/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $couponRepo */
			$couponRepo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
			$couponRepo->sendModeratorActionAlert($this->coupon, 'edit', $this->alertReason);
		}

		return $coupon;
	}

	public function beforeUpdate(): void
	{
	}
	
	/**
	 * @throws \LogicException
	 * @throws \Exception
	 * @throws \XF\PrintableException
	 */
	public function afterUpdate(): void
	{
		$coupon = $this->coupon;

		if ($this->title)
		{
			/** @var \XF\Entity\Phrase $title */
			$title = $coupon->getMasterTitlePhrase();
			$title->phrase_text = $this->title;
			$title->save();
		}
		
		if ($this->upgradeDiscounts !== null)
		{
			/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $repo */
			$repo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
			$repo->updateContentAssociations($this->coupon->coupon_id, $this->upgradeDiscounts);
		}
	}
}