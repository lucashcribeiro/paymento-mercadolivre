<?php /** @noinspection PhpMissingReturnTypeInspection */

namespace DBTech\UserUpgradeCoupon\XF\Entity;

/**
 * Class UserUpgrade
 * @package DBTech\UserUpgradeCoupon\XF\Entity
 */
class UserUpgrade extends XFCP_UserUpgrade
{
	/**
	 * @param string $cost
	 *
	 * @return \XF\Phrase
	 */
	protected function _getPhraseFromCost(string $cost)
	{
		$phrase = $cost;
		
		if ($this->length_unit)
		{
			if ($this->length_amount > 1)
			{
				if ($this->recurring)
				{
					$phrase = \XF::phrase("x_per_y_{$this->length_unit}s", [
						'cost' => $cost,
						'length' => $this->length_amount
					]);
				}
				else
				{
					$phrase = \XF::phrase("x_for_y_{$this->length_unit}s", [
						'cost' => $cost,
						'length' => $this->length_amount
					]);
				}
			}
			else
			{
				if ($this->recurring)
				{
					$phrase = \XF::phrase("x_per_{$this->length_unit}", [
						'cost' => $cost
					]);
				}
				else
				{
					$phrase = \XF::phrase("x_for_one_{$this->length_unit}", [
						'cost' => $cost
					]);
				}
			}
		}
		
		return $phrase;
	}
	
	/**
	 * @return \XF\Phrase|string
	 */
	public function getCostPhrase()
	{
		/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $couponRepo */
		$couponRepo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
		$coupon = $couponRepo->getCouponFromCookie();
		
		if (!$coupon || !$coupon->canUse() || !$coupon->isApplicable($this))
		{
			return parent::getCostPhrase();
		}
			
		$oldCost = $this->app()->data('XF:Currency')->languageFormat($this->cost_amount, $this->cost_currency);
		$cost = $this->app()->data('XF:Currency')->languageFormat(
			$coupon->getDiscountedCost($this, $this->cost_amount),
			$this->cost_currency
		);
		$phrase = '<span class="userUpgradeCoupon-oldPrice">' . $this->_getPhraseFromCost($oldCost) . '</span>';
		$phrase .= '<br />';
		$phrase .= $this->_getPhraseFromCost($cost);
		
		return new \XF\PreEscaped($phrase);
	}
	
	/**
	 * @return bool
	 */
	public function isFreeAfterCoupon()
	{
		/** @var \DBTech\UserUpgradeCoupon\Repository\Coupon $couponRepo */
		$couponRepo = $this->repository('DBTech\UserUpgradeCoupon:Coupon');
		$coupon = $couponRepo->getCouponFromCookie();
		
		if (!$coupon
			|| !$coupon->canUse()
			|| !$coupon->isApplicable($this)
			|| $coupon->getDiscountedCost($this, $this->cost_amount) > 0.00
		) {
			return false;
		}
		
		return true;
	}
}