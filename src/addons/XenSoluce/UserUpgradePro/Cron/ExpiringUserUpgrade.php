<?php

namespace XenSoluce\UserUpgradePro\Cron;

class ExpiringUserUpgrade
{
    public static function runAlertExpiringUserUpgrades()
    {
        $userUpgradeRepo = \XF::repository('XenSoluce\UserUpgradePro:ExpiringUserUpgrade');
        $userUpgradeRepo->alertExpiringUserUpgrades();
        $userUpgradeRepo->alertExpiringUserUpgradesAdmin();
    }
}