<?php

namespace XenSoluce\UserUpgradePro\XF\Admin\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

class UserUpgrade extends XFCP_UserUpgrade
{
	protected function upgradeSaveProcess(\XF\Entity\UserUpgrade $upgrade)
	{
        $form = parent::upgradeSaveProcess($upgrade);
        $input = $this->filter([
            'xs_uup_renew_day' => 'uint',
            'xs_uup_alert_time_active' => 'uint',
            'xs_uup_alert_time_expired' => 'uint',
            'xs_uup_invoice_active' => 'bool',
            'xs_uup_alert_admin' => 'bool',
        ]);
        $form->basicEntitySave($upgrade, $input);
        return $form;
	}
}