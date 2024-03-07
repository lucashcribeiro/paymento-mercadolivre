<?php


namespace XenSoluce\UserUpgradePro\Alert;

use XF\Alert\AbstractHandler;

class AbstractAlert extends AbstractHandler
{
    /**
     * @return array
     */
    public function getEntityWith()
    {
        return [
            'Upgrade',
            'User'
        ];
    }

    /**
     * @return array
     */
    public function getOptOutActions()
    {
        return [];
    }

    /**
     * @return int
     */
    public function getOptOutDisplayOrder()
    {
        return 100;
    }
}