<?php

namespace XenSoluce\UserUpgradePro\Pub\Controller;

use XF\Language;
use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;

class RenewSub extends AbstractController
{
    public function actionIndex(){
        return $this->redirect($this->buildLink('account/upgrades')) ;
    }

    protected function Renew($upgrade)
    {
        $paymentRepo = $this->repository('XF:Payment');
        $profiles = $paymentRepo->getPaymentProfileOptionsData();
        $viewParams = [
            'upgrade' => $upgrade,
            'profiles' => $profiles
        ];
        return $this->view('XenSoluce\UserUpgradePro:RenewSub\Renew', 'xs_uup_renew', $viewParams);
    }

    public function actionRenew(ParameterBag $params)
    {
        $upgrade = $this->assertUserUpgradeExists($params['user_upgrade_id']);
        if(!$upgrade->canRenew())
        {
            return $this->error(\XF::phrase('xs_uup_cant_renew_subscription'));
        }
        return $this->Renew($upgrade);

    }

    public function actionRenewExpired(ParameterBag $params)
    {
        $upgrade = $this->assertUserUpgradeExists($params['user_upgrade_id']);
        $visitor = \XF::visitor();
        if($upgrade->Active[$visitor->user_id]['user_upgrade_id'])
        {
            return $this->error(\XF::phrase('xs_uup_cant_renew_subscription'));
        }
        return $this->Renew($upgrade);
    }

    public function actionExpiredPopup()
    {
        $visitor = \XF::visitor();
        $userUpgrade = $this->finder('XF:UserUpgrade')->fetch();
        $expiring = [];
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
            if($expired == null || !empty($active))
            {
                continue;
            }
            $expiring[] = $expired;
        }

        $viewParams = [
            'expiring' => $expiring
        ];
        return $this->view('XF:Conversations\Popup', 'xs_uup_expired_popup', $viewParams);
    }

    public function actionActivePopup()
    {
        $visitor = \XF::visitor();
        $userUpgrade = $this->finder('XF:UserUpgrade')->fetch();
        $activate = [];
        foreach ($userUpgrade as $upgrade)
        {
            $active = $this->finder('XF:UserUpgradeActive')
                ->where([
                    'user_upgrade_id' => $upgrade->user_upgrade_id,
                    'user_id' => $visitor->user_id
                ])->fetchOne();
            if($active == null)
            {
                continue;
            }
            $activate[] = $active;
        }

        $viewParams = [
            'activate' => $activate
        ];
        return $this->view('XF:Conversations\Popup', 'xs_uup_active_popup', $viewParams);
    }
    
    protected function assertUserUpgradeExists($id, $with = null, $phraseKey = null)
    {
        return $this->assertRecordExists('XF:UserUpgrade', $id, $with, $phraseKey);
    }
}