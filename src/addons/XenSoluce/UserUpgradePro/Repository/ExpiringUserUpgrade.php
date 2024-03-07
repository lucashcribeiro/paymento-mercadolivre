<?php

namespace XenSoluce\UserUpgradePro\Repository;

use XF\Entity\UserUpgradeActive;
use XF\Entity\UserUpgrade as UserUpgradeEntity;
use XF\PrintableException;
use XF\Mvc\Entity\Repository;

class ExpiringUserUpgrade extends Repository
{
    public function alertExpiringUserUpgrades()
    {
        $Active = $this->findActiveUpgrade()
            ->where('xs_uup_notified_date', '=', 0)
            ->with('Upgrade')
            ->with('User')
            ->fetch();
        $this->ForeachUpgrade($Active, 'Active');

        $Expired = $this->finder('XF:UserUpgradeExpired')
            ->where('xs_uup_notified_date', '=', 0)
            ->with('Upgrade')
            ->with('User')
            ->fetch();
        $this->ForeachUpgrade($Expired, 'Expired');
    }

    protected function ForeachUpgrade($upgradExpiredActive, $timeType )
    {
        foreach ($upgradExpiredActive AS $UpgradeEA)
        {
            $upgrade = $UpgradeEA->Upgrade;
            if(empty($upgrade))
            {
                continue;
            }
            if ($upgrade && $upgrade->recurring)
            {
                if ($UpgradeEA->end_date + 86400 >= \XF::$time)
                {
                    continue;
                }
            }
            $timetest = false;
            switch ($timeType)
            {
                case 'Active':
                    $xs_uup_alert_time = $upgrade->xs_uup_alert_time_active;
                    if($UpgradeEA->end_date - 86400 * $xs_uup_alert_time <= \XF::$time)
                    {
                        $timetest = true;
                    }
                    $action = [
                        'type' => 'active',
                        'recurring' => 0
                    ];
                    break;
                case 'Expired':
                    $xs_uup_alert_time = $upgrade->xs_uup_alert_time_expired;
                    if($UpgradeEA->end_date + 86400 * $xs_uup_alert_time <= \XF::$time &&
                        $UpgradeEA->end_date + 86400 * ($xs_uup_alert_time + 5) >= \XF::$time)
                    {
                        $timetest = true;
                    }
                    $action = [
                        'type' => 'expired',
                        'recurring' => 1
                    ];
                    break;
            }

            if ($upgrade && $xs_uup_alert_time > 0 &&
                $timetest && !$upgrade->recurring && $upgrade->length_amount > 0)
            {
                try
                {
                    $Notify = $this->xsNotifyUser($UpgradeEA, $action);
                    if($Notify)
                    {
                        $UpgradeEA->xs_uup_notified_date = \XF::$time;
                        $UpgradeEA->save();
                    }
                }
                catch (PrintableException $e)
                {
                    \XF::logException($e);
                }
            }
        }
    }

    protected function xsNotifyUser($record, array $action)
    {
        $user = $record->User;
        if($user->user_state === 'valid' && !$user->is_banned && $record->Upgrade->can_purchase)
        {
            switch ($action['recurring'])
            {
                case 0:
                    $upgrade = $record->Upgrade;
                    $params = $this->ParamAlert($record, $action, $upgrade->xs_uup_alert_time_active);
                break;
                case 1:
                    $upgrade = $record->Upgrade;
                    $params = $this->ParamAlert($record, $action, $upgrade->xs_uup_alert_time_expired);
                    break;
                default:
                    return false;
            }
            $options = \XF::options();
            //Email
            if($user->email && $user->Option->receive_admin_email && $options->xs_uup_enable_send_email)
            {
                $templateName = 'xs_uup_' . $action['type'] . '_email';
                $mail = $this->app()->mailer()->newMail()
                    ->setToUser($record->User)
                    ->setTemplate($templateName, $params);
                $mail->queue();
            }

            //conversation
            if($options->xs_uup_conversation_user)
            {
                $title = \XF::phrase('xs_uup_conversation_' . $action['type'] . '_title', $params);
                $message = \XF::phrase('xs_uup_conversation_' . $action['type'] . '_message', $params)->render('raw');
                $tokens = [
                    '{name}' => $user->username,
                    '{id}'   => $user->user_id
                ];
                $message = strtr($message, $tokens);
                $ByUser = $this->finder('XF:User')
                    ->where('username', '=', $options->xs_uup_conversation_user)
                    ->with([
                        'Profile',
                        'Privacy',
                        'PermissionCombination'
                    ])->fetchOne();
                \XF::asVisitor($ByUser, function () use ($ByUser, $user, $title, $message) {
                    $conversationCreator = $this->app()->service('XF:Conversation\Creator', $ByUser);
                    $conversationCreator->setIsAutomated();
                    $conversationCreator->setRecipientsTrusted([$user]);
                    $conversationCreator->setContent($title, $message);
                    $conversationCreator->setAutoSendNotifications(false);
                    $conversationCreator->save();
                    \XF::runLater(function() use ($conversationCreator) {
                        $conversationCreator->sendNotifications();
                    });

                });
            }

            //Alert
            if($options->xs_uup_enable_send_alert)
            {
                $alertRepo = $this->repository('XF:UserAlert');

                $alertRepo->alert(
                    $record->User,
                    $user->user_id,
                    '',
                    'user',
                    $user->user_id,
                    'xs_uup_alert_' . $action['type'],
                    $params);
            }
            return true;
        }
        return false;
    }

    protected function ParamAlert($record ,array $action, $time)
    {
        $upgrade = $record->Upgrade;
        $params = [
            'username'      => $record->User->username,
            'upgradeTitle' => $upgrade->title,
            'upgradeUrl'    => $this->app()->router('public')->buildLink('canonical:account/upgrades'),
        ];
        if($action['type'] == 'active')
        {
            $cutOff = \XF::$time + (86400 * $time);
            $numDays = ceil($time - (($cutOff - $record->end_date) / 86400));
            if ($numDays < 0)
            {
                $numDays = 0;
            }
            $params['days'] = $numDays;
        }
        return $params;
    }
    protected function findActiveUpgrade()
    {
        return $this->finder('XF:UserUpgradeActive');
    }
    public function hasActiveUserUpgrade(\XF\Entity\User $user)
    {
        $finder = $this->findActiveUpgrade();
        return $finder->where('user_id', $user->user_id)->total();
    }
    public function hasExpireXNextDay($day, \XF\Entity\User $user)
    {
        $time = \xf::$time + ($day * 86400);
        $finder = $this->findActiveUpgrade();
        return $finder
            ->where([
                ['end_date', '<=', $time],
                ['end_date', '!=', 0],
                'user_id' => $user->user_id
            ])->total();
    }
    public function hasUserExpire(\XF\Entity\User $user)
    {
        $finder = $this->finder('XF:UserUpgradeExpired');
        return $finder
            ->where('user_id', '=', $user->user_id)
            ->total();
    }
    public function getUserUpgrade()
    {
        $repo = $this->repository('XF:UserUpgrade');
        return $repo->findUserUpgradesForList()->fetch();
    }
    public function getProfilePaymentByUser($user, $paymentId)
    {
        $upgradeRepo = $this->getUserUpgradeRepo();
        $activeFinder = $upgradeRepo->findActiveUserUpgradesForList()
            ->order('user_upgrade_record_id');
        $activeUpgrades = $activeFinder
            ->where('user_id', $user->user_id)->fetch()->last();
        if(isset($activeUpgrades->PurchaseRequest->payment_profile_id))
        {
            return $activeUpgrades->PurchaseRequest->payment_profile_id;
        }
        if(!empty($activeUpgrades) && $paymentId[0] == 0 && !isset($activeUpgrades->PurchaseRequest->payment_profile_id))
        {
            return false;
        }
        if(empty($activeUpgrades) || !isset($activeUpgrades->PurchaseRequest->payment_profile_id))
        {
            $activeFinder = $upgradeRepo->findExpiredUserUpgradesForList()
                ->order('user_upgrade_record_id');
            $expireUpgrades = $activeFinder
                ->where('user_id', $user->user_id)->fetch()->last();
            if(isset($expireUpgrades->PurchaseRequest->payment_profile_id))
            {
                return $expireUpgrades->PurchaseRequest->payment_profile_id;
            }
        }
        return false;
    }
    public function getPayments()
    {
        $paymentRepo = $this->repository('XF:Payment');
        return $paymentRepo->findPaymentProfilesForList()->fetch();
    }
    public function hasAtXUserUpgrade($ids, \XF\Entity\User $user, $shortName = 'XF:UserUpgradeExpired')
    {
        return $this->finder($shortName)
            ->where([
                ['Upgrade.user_upgrade_id', '=', $ids],
                'user_id' => $user->user_id
            ])->total();
    }
    public function getUpgrades()
    {
        $upgradeRepo = $this->getUserUpgradeRepo();
        return $upgradeRepo->findUserUpgradesForList()->fetch();
    }
    protected function hasUserUpgradeActive($user, $userUpgradeIds)
    {
        $upgradeRepo = $this->getUserUpgradeRepo();
        return
            $upgradeRepo
                ->findActiveUserUpgradesForList()
                ->order('user_upgrade_record_id')
                ->where([
                    'user_id' => $user->user_id,
                    'user_upgrade_id' => $userUpgradeIds
                ]);
    }
    protected function hasUserUpgradeExpired($user, $userUpgradeIds)
    {
        $upgradeRepo = $this->getUserUpgradeRepo();
        return
            $upgradeRepo
                    ->findExpiredUserUpgradesForList()
                    ->order('user_upgrade_record_id')
                    ->where([
                        'user_id' => $user->user_id,
                        'user_upgrade_id' => $userUpgradeIds
                    ]);
    }
    public function hasUserUpgradeByCount($user, $userUpgradeIds, $count)
    {
        $activeUpgrades = $this->hasUserUpgradeActive($user, $userUpgradeIds)
            ->total();
        if($activeUpgrades >= $count)
        {
            return true;
        }
        $expireUpgrades = $this->hasUserUpgradeExpired($user, $userUpgradeIds)
            ->total();
        $totalUpgrades = $expireUpgrades + $activeUpgrades;
        if($totalUpgrades >= $count)
        {
            return true;
        }
        return false;
    }
    public function hasUserUpgradeById($user, $userUpgradeIds)
    {
        $activeUpgrades = $this->hasUserUpgradeActive($user, $userUpgradeIds)
            ->fetch()
            ->last();
        if(!empty($activeUpgrades))
        {
            return $activeUpgrades->user_upgrade_id;
        }
        $expireUpgrades = $this->hasUserUpgradeExpired($user, $userUpgradeIds)
            ->fetch()
            ->last();
        if(!empty($expireUpgrades))
        {
            return $expireUpgrades->user_upgrade_id;
        }
        return false;
    }
    public function alertExpiringUserUpgradesAdmin()
    {
        $option = \XF::options();
        if($option->xs_uup_administrator_alert_before_expiration)
        {
            $Active = $this->findActiveUpgrade()
                ->where([
                    'xs_uup_notified_date_admin' => 0,
                    'Upgrade.xs_uup_alert_admin' => 1
                ])
                ->with('Upgrade')
                ->with('User')
                ->fetch();
            $this->foreachAdmin($Active, 'active');
        }
        if($option->xs_uup_administrator_alert_after_expiration)
        {
            $Expired = $this->finder('XF:UserUpgradeExpired')
                ->where([
                    'xs_uup_notified_date_admin' => 0,
                    'Upgrade.xs_uup_alert_admin' => 1
                ])
                ->with('Upgrade')
                ->with('User')
                ->fetch();
            $this->foreachAdmin($Expired, 'expired');
        }
    }
    protected function foreachAdmin($ExpiresActives, $type)
    {
        $option = \XF::options();
        $users = $this->finder('XF:User')
            ->where('xs_uup_alert_expired', 1)
            ->fetch();

        foreach ($users as $user)
        {
            foreach ($ExpiresActives AS $ExpireActive)
            {
                $upgrade = $ExpireActive->Upgrade;
                if(empty($upgrade))
                {
                    continue;
                }

                if ($upgrade && $upgrade->recurring && $ExpireActive instanceof \XF\Entity\UserUpgradeActive)
                {
                    continue;
                }
                $timeTest = false;
                $actionType = '';
                switch ($type)
                {
                    case 'active' :
                        $alert = $option->xs_uup_administrator_alert_before_expiration;
                        if ($ExpireActive->end_date - 86400 * $alert <= \XF::$time)
                        {
                            $timeTest = true;
                        }
                        $actionType = 'active';
                        break;
                    case 'expired' :
                        $alert = $option->xs_uup_administrator_alert_after_expiration;
                        if($ExpireActive->end_date + 86400 * $alert <= \XF::$time  &&
                            $ExpireActive->end_date + 86400 * ($alert + 5) >= \XF::$time)
                        {
                            $timeTest = true;
                        }
                        $actionType = 'expired';
                        break;
                }
                if($timeTest)
                {

                    /** @var \XF\Repository\UserAlert $alertRepo */
                    $alertRepo = $this->repository('XF:UserAlert');
                    $extra = [
                        'link' => $this->app()->router()->buildLink('members', $ExpireActive->User),
                        'user' => $ExpireActive->User->username,
                        'title' => $ExpireActive->Upgrade->title,
                    ];
                    $alertRepo->alert(
                        $user,
                        $ExpireActive->User->user_id,
                        '',
                        'xs_uup_' . $actionType,
                        $ExpireActive->user_upgrade_record_id,
                        'admin_alert',
                        $extra);
                    $ExpireActive->xs_uup_notified_date_admin = \XF::$time;
                    $ExpireActive->save();
                }
            }
        }
    }
    /**
     * @return \XF\Repository\UserUpgrade
     */
    protected function getUserUpgradeRepo()
    {
        return $this->repository('XF:UserUpgrade');
    }
}