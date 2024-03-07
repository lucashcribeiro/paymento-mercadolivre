<?php

namespace XenSoluce\UserUpgradePro\Pub\Controller;

use XF\Language;
use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;

class UserUpgradeInvoice extends AbstractController
{
    protected function preDispatchController($action, ParameterBag $params)
    {
        $this->assertRegistrationRequired();
    }

    public function actionIndex(){

        $visitor = \XF::visitor();
        $active = $this->finder('XF:UserUpgradeActive')
            ->where([
                'user_id' => $visitor->user_id,
                'Upgrade.xs_uup_invoice_active' => 0
            ])
            ->order('start_date', 'DESC')
            ->fetch();
        $page = $this->filterPage();
        $perPage = 20;
        $expired = $this->finder('XF:UserUpgradeExpired')
            ->where([
                'user_id' => $visitor->user_id,
                'Upgrade.xs_uup_invoice_active' => 0
            ])
            ->order('end_date', 'DESC');
        $expired->limitByPage($page, $perPage);
        $viewParams = [
            'active' => $active,
            'expired' => $expired->fetch(),
            'expiredTotal' => $expired->total(),
            'expiredPage' => $page,
            'expiredPerPage' => $perPage
        ];

        return $this->view('XenSoluce\UserUpgradePro:UserUpgradeInvoice\Index', 'xs_uup_invoice_index', $viewParams);
    }

    protected function ActiveExpired($upgrade)
    {
        $options = \XF::options();
        $visitor = \XF::visitor();
        $fieldFinder = $this->finder('XF:UserField')->where('xs_uup_enable_invoice', 1)->fetch();
        $userField = $this->finder('XF:UserProfile')->where('user_id', $visitor->user_id)->fetchOne();
        $viewParams = [
            'upgrade' => $upgrade,
            'CompanyDetail' => nl2br($options->xs_uup_invoice_campany_details),
            'FooterBlock' => nl2br($options->xs_uup_footer_block ),
            'fieldFinder' => $fieldFinder,
            'userField' => $userField
        ];
        return $this->view('XenSoluce\UserUpgradePro:UserUpgradeInvoice\View', 'xs_uup_invoice_invoice', $viewParams);
    }

    public function actionInvoiceActive(ParameterBag $params)
    {
        $Active = $this->assertUserUpgradeActiveExists($params->user_upgrade_record_id);

        return $this->ActiveExpired($Active);
    }

    public function actionInvoiceExpired(ParameterBag $params)
    {
        $Expired = $this->assertUserUpgradeExpiredExists($params->user_upgrade_record_id);

        return $this->ActiveExpired($Expired);
    }

    protected function assertUserUpgradeActiveExists($id, $with = null, $phraseKey = null)
    {
        return $this->assertRecordExists('XF:UserUpgradeActive', $id, $with, $phraseKey);
    }
    
    protected function assertUserUpgradeExpiredExists($id, $with = null, $phraseKey = null)
    {
        return $this->assertRecordExists('XF:UserUpgradeExpired', $id, $with, $phraseKey);
    }
}