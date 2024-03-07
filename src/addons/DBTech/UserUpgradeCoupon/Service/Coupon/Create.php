<?php

namespace DBTech\UserUpgradeCoupon\Service\Coupon;

use DBTech\UserUpgradeCoupon\Entity\Coupon;

/**
 * Class Create
 *
 * @package DBTech\UserUpgradeCoupon\Service\Coupon
 */
class Create extends \XF\Service\AbstractService
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
	protected $performValidations = true;


	/**
	 * Create constructor.
	 *
	 * @param \XF\App $app
	 */
	public function __construct(\XF\App $app)
	{
		parent::__construct($app);

		$this->coupon = $app->em()->create('DBTech\UserUpgradeCoupon:Coupon');

		$this->setupDefaults();
	}

	/**
	 *
	 */
	protected function setupDefaults(): void
	{
		$this->coupon->coupon_state = 'visible';
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
			$hours = $language->date(\XF::$time, 'H');
			$minutes = $language->date(\XF::$time, 'i');
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
	 * @param int $amount
	 * @param string $unit
	 */
	public function setDuration($amount, $unit): void
	{
		$coupon = $this->coupon;
		$coupon->expiry_date = strtotime('+' . $amount . ' ' . $unit, $coupon->start_date);
	}

	/**
	 * @param array $discounts
	 */
	public function setUpgradeDiscounts(array $discounts): void
	{
		$this->upgradeDiscounts = $discounts;
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
	protected function _save():Coupon
	{
		$coupon = $this->coupon;

		$this->beforeInsert();

		$db = $this->db();
		$db->beginTransaction();

		$coupon->save(true, false);

		$this->afterInsert();

		$db->commit();

		return $coupon;
	}

	public function beforeInsert(): void
	{
	}
	
	/**
	 * @throws \LogicException
	 * @throws \Exception
	 * @throws \XF\PrintableException
	 */
	public function afterInsert(): void
	{
		$coupon = $this->coupon;

		if ($this->title)
		{
			/** @var \XF\Entity\Phrase $title */
			$title = $coupon->getMasterTitlePhrase();
			$title->phrase_text = $this->title;
			$title->save();
		}
		
		if ($this->upgradeDiscounts)
		{
			/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $repo */
			$repo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
			$repo->updateContentAssociations($this->coupon->coupon_id, $this->upgradeDiscounts);
		}
	}
}