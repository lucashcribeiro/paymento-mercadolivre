<?php /** @noinspection PhpMissingReturnTypeInspection */

namespace DBTech\UserUpgradeCoupon\XF\Entity;

/**
 * Class UserUpgradeActive
 * @package DBTech\UserUpgradeCoupon\XF\Entity
 */
class UserUpgradeActive extends XFCP_UserUpgradeActive
{
	/**
	 * @return \XF\Phrase|string
	 */
	public function getUserUpgradeCouponPhrase()
	{
		if (!empty($this->extra['dbtech_user_upgrade_coupon_id']))
		{
			$cost = $this->app()
				->data('XF:Currency')
				->languageFormat($this->extra['cost_amount'], $this->extra['cost_currency'])
			;
			$phrase = $cost;
			
			if ($this->extra['length_unit'])
			{
				if ($this->extra['length_amount'] > 1)
				{
					if ($this->Upgrade->recurring)
					{
						$phrase = \XF::phrase("x_per_y_{$this->extra['length_unit']}s", [
							'cost'   => $cost,
							'length' => $this->extra['length_amount']
						]);
					}
					else
					{
						$phrase = \XF::phrase("x_for_y_{$this->extra['length_unit']}s", [
							'cost'   => $cost,
							'length' => $this->extra['length_amount']
						]);
					}
				}
				else
				{
					if ($this->Upgrade->recurring)
					{
						$phrase = \XF::phrase("x_per_{$this->extra['length_unit']}", [
							'cost' => $cost
						]);
					}
					else
					{
						$phrase = \XF::phrase("x_for_one_{$this->extra['length_unit']}", [
							'cost' => $cost
						]);
					}
				}
			}
			
			return $phrase;
		}
		
		return $this->Upgrade->cost_phrase;
	}
}