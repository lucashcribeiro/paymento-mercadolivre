<?php

namespace XenSoluce\UserUpgradePro\XF\Entity;

use XF\Mvc\Entity\Structure;

class UserUpgradeExpired extends XFCP_UserUpgradeExpired
{
    public function canView()
    {
        return true;
    }
	public static function getStructure(Structure $structure)
	{
		$structure = parent::getStructure($structure);

        $structure->columns['xs_uup_notified_date'] = ['type' => self::UINT, 'default' => 0];
        $structure->columns['xs_uup_notified_date_admin'] = ['type' => self::UINT, 'default' => 0];
		return $structure;
	}
}