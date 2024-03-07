<?php

namespace XenSoluce\UserUpgradePro\XF\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class User extends XFCP_User
{
	public function canViewXsActiveExpiredUserUpgrade()
    {
        $visitor = \XF::visitor();
        $userUpgrade = $this->finder('XF:UserUpgrade')->fetch();
        $expiringActive = [];

        foreach ($userUpgrade as $upgrade)
        {
            $expired = $this->finder('XF:UserUpgradeExpired')
                ->where([
                    'user_upgrade_id'=> $upgrade->user_upgrade_id,
                    'user_id' => $visitor->user_id
                ])->with('Upgrade')
                ->fetchOne();
            $active = $this->finder('XF:UserUpgradeActive')
                ->where([
                    'user_upgrade_id' => $upgrade->user_upgrade_id,
                    'user_id' => $visitor->user_id
                ])->fetchOne();
            if($active != null)
            {
                $expiringActive['active'][] = $active;
            }
            if($expired == null || !empty($active))
            {
                continue;
            }
            $expiringActive['expired'][] = $expired;
        }
        $param = [
            'active' => true,
            'expired' => true
        ];
        if(empty($expiringActive['active']) )
        {
            $param['active'] = false;
        }
        if(empty($expiringActive['expired']))
        {
            $param['expired'] = false;
        }
        return $param;
    }
    
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);
        $structure->columns['xs_uup_count_upgrade'] =  ['type' => self::UINT, 'default' => 0, 'changeLog' => false];
        $structure->columns['xs_uup_alert_expired'] =  ['type' => self::BOOL, 'default' => 0, 'changeLog' => false];
        return $structure;
    }
}