<?php

namespace XenSoluce\UserUpgradePro\XF\Entity;

use XF\Mvc\Entity\Structure;

class UserUpgrade extends XFCP_UserUpgrade
{
    protected $_uup = null;

    public function setUup($uup)
    {
        $this->_uup = $uup;
    }

    public function getUup()
    {
        return $this->_uup;
    }

	public function canPurchase()
	{
		$visitor = \XF::visitor();
		if(isset($this->Active[$visitor->user_id]))
        {
            if($this->Active[$visitor->user_id]['end_date'] - 86400 * $this->xs_uup_renew_day <= \XF::$time && $this->Active[$visitor->user_id])
            {
                return true;
            }
        }
		return parent::canPurchase();
	}

	public function canRenew()
    {
        $visitor = \XF::visitor();
        if(isset($this->Active))
        {
            if($this->Active[$visitor->user_id]['end_date'] - 86400 * $this->xs_uup_renew_day <= \XF::$time && $this->Active[$visitor->user_id] && $this->length_amount != 0)
            {
                return true;
            }
        }

        return false;
    }

    public function canRenewExpired($UserUpgradeID)
    {
        $Active = $this->finder('XF:UserUpgradeActive')->where('user_upgrade_id', $UserUpgradeID)->fetchOne();
        if(empty($Active))
        {
            return true;
        }
        return false;
    }
    
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);
        $structure->columns += [
            'xs_uup_renew_day' => ['type' => self::UINT],
            'xs_uup_alert_time_active' =>  ['type' => self::UINT],
            'xs_uup_alert_time_expired' => ['type' => self::UINT],
            'xs_uup_invoice_active' => ['type' => self::BOOL, 'default' => false],
            'xs_uup_alert_admin' => ['type' => self::BOOL, 'default' => false]
        ];

        return $structure;
    }
}