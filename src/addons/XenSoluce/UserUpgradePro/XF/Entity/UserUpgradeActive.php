<?php

namespace XenSoluce\UserUpgradePro\XF\Entity;

use XF\Mvc\Entity\Structure;

class UserUpgradeActive extends XFCP_UserUpgradeActive
{
    public function canView()
    {
        return true;
    }
    /**
     * @throws \XF\PrintableException
     */
    protected function _postSave()
    {
        parent::_postSave();
        if($this->isInsert() && \XF::options()->xs_uup_count_manual_upgrades)
        {
            $user = $this->User;
            $user->xs_uup_count_upgrade += 1;
            $user->save();
        }
    }
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->columns['xs_uup_notified_date'] = ['type' => self::UINT, 'default' => 0];
        $structure->columns['xs_uup_notified_date_admin'] = ['type' => self::UINT, 'default' => 0];
        return $structure;
    }
}