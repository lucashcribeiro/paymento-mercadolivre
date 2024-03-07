<?php

namespace XenSoluce\UserUpgradePro;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;
use XF\Db\SchemaManager;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;
    
    public function installStep1(array $stepParams = [])
    {
        $sm = $this->schemaManager();
        $sm->alterTable('xf_user', function(Alter $table)
        {
            $table->addColumn('xs_uup_count_upgrade', 'int')->setDefault(0);
            $table->addColumn('xs_uup_alert_expired', 'tinyint')->setDefault(0);
        });
        $sm->alterTable('xf_user_upgrade_active', function(Alter $table)
        {
            $table->addColumn('xs_uup_notified_date', 'int')->setDefault(0);
            $table->addColumn('xs_uup_notified_date_admin', 'int')->setDefault(0);

        });
        $sm->alterTable('xf_user_upgrade_expired', function(Alter $table)
        {
            $table->addColumn('xs_uup_notified_date', 'int')->setDefault(0);
            $table->addColumn('xs_uup_notified_date_admin', 'int')->setDefault(0);
        });
        $sm->alterTable('xf_user_upgrade', function(Alter $table)
        {
            $table->addColumn('xs_uup_renew_day', 'int')->setDefault(0);
            $table->addColumn('xs_uup_alert_time_active', 'int')->setDefault(0);
            $table->addColumn('xs_uup_alert_time_expired', 'int')->setDefault(0);
            $table->addColumn('xs_uup_invoice_active', 'tinyint')->setDefault(0);
            $table->addColumn('xs_uup_alert_admin', 'tinyint')->setDefault(0);
        });
        $sm->alterTable('xf_user_field', function(Alter $table)
        {
            $table->addColumn('xs_uup_enable_invoice', 'tinyint',3)->setDefault(0);
        });
    }
    public function postInstall(array &$stateChanges)
    {
        $this->CountUpgrade();
    }
    protected function CountUpgrade()
    {
        $db = $this->db();
        $UpgradesActive = $db->fetchAll('SELECT user_id, COUNT(*) as count FROM xf_user_upgrade_active GROUP BY user_id');
        $idsExclude = [];
        $listIds = [];
        $countList = [];
        foreach ($UpgradesActive as $UpgradeActive)
        {
            $listIds[] = $UpgradeActive['user_id'];
            $idsExclude[] = $UpgradeActive['user_id'];
            $UpgradeExpire = $db->fetchAll('SELECT user_id, COUNT(*) as count FROM xf_user_upgrade_expired WHERE user_id = ?', $UpgradeActive['user_id']);
            $UpgradeExpire = $UpgradeExpire[0];
            $count = $UpgradeActive['count'];
            if($UpgradeExpire['user_id'] !== null)
            {
                $count += $UpgradeExpire['count'];
            }
            $countList[$UpgradeActive['user_id']] = $count;
        }
        if(!empty($idsExclude))
        {
            $UpgradesExpire = $db->fetchAll('SELECT user_id, COUNT(*) as count FROM xf_user_upgrade_expired WHERE user_id NOT IN (' . implode(',', $idsExclude) . ') GROUP BY user_id');
        }
        else
        {
            $UpgradesExpire = $db->fetchAll('SELECT user_id, COUNT(*) as count FROM xf_user_upgrade_expired GROUP BY user_id');
        }

        if(!empty($UpgradesExpire))
        {
            foreach ($UpgradesExpire as $UpgradeExpireFor)
            {
                $listIds[] = $UpgradeExpireFor['user_id'];
                $countList[$UpgradeExpireFor['user_id']] = $UpgradeExpireFor['count'];
            }
        }
        if(!empty($listIds))
        {
            foreach ($listIds as $listId)
            {
                $db->query("
                    UPDATE xf_user
                    SET xs_uup_count_upgrade = ?
                    WHERE user_id = ?
                ",[$countList[$listId], $listId]);
            }
        }
    }
    /**Version : 2.0.2*/
    public function upgrade2000510Step1()
    {
        $sm = $this->schemaManager();
        $sm->alterTable('xf_user', function(Alter $table)
        {
            $table->addColumn('xs_uup_alert_expired', 'tinyint')->setDefault(0);
        });
        $sm->alterTable('xf_user_upgrade_active', function(Alter $table)
        {
            $table->addColumn('xs_uup_notified_date_admin', 'int')->setDefault(0);

        });
        $sm->alterTable('xf_user_upgrade_expired', function(Alter $table)
        {
            $table->addColumn('xs_uup_notified_date_admin', 'int')->setDefault(0);
        });
        $sm->alterTable('xf_user_upgrade', function(Alter $table)
        {
            $table->addColumn('xs_uup_alert_admin', 'tinyint')->setDefault(0);
        });
    }

    /**Version : 2.1.0 Fix 1*/
    public function upgrade2010010Step1()
    {
        $sm = $this->schemaManager();
        $sm->alterTable('xf_user_upgrade', function(Alter $table)
        {
            $table->changeColumn('xs_uup_renew_day')->setDefault(0);
            $table->changeColumn('xs_uup_alert_time_active')->setDefault(0);
            $table->changeColumn('xs_uup_alert_time_expired')->setDefault(0);
        });
    }

    /**
     * @param array $stepParams
     */
    public function uninstallStep1(array $stepParams = [])
    {
        $sm = $this->schemaManager();

        $sm->alterTable('xf_user', function(Alter $table)
        {
            $table->dropColumns('xs_uup_count_upgrade');
            $table->dropColumns('xs_uup_alert_expired');
        });
        $sm->alterTable('xf_user_upgrade_active', function(Alter $table)
        {
            $table->dropColumns('xs_uup_notified_date');
            $table->dropColumns('xs_uup_notified_date_admin');
        });
        $sm->alterTable('xf_user_upgrade_expired', function(Alter $table)
        {
            $table->dropColumns('xs_uup_notified_date');
            $table->dropColumns('xs_uup_notified_date_admin');
        });
        $sm->alterTable('xf_user_upgrade', function(Alter $table)
        {
            $table->dropColumns('xs_uup_renew_day');
            $table->dropColumns('xs_uup_alert_time_active');
            $table->dropColumns('xs_uup_alert_time_expired');
            $table->dropColumns('xs_uup_invoice_active');
            $table->dropColumns('xs_uup_alert_admin');
        });
        $sm->alterTable('xf_user_field', function(Alter $table)
        {
            $table->dropColumns('xs_uup_enable_invoice');
        });
    }
}