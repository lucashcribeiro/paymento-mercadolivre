<?php

namespace  XenSoluce\UserUpgradePro\XF\Admin\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

class User extends XFCP_User
{

	protected function userSaveProcess(\XF\Entity\User $user)
	{
		$form = parent::userSaveProcess($user);

        $input = $this->filter(['xs_uup_alert_expired'=> 'bool']);

        $form->basicEntitySave($user, $input);
        return $form;
	}
}