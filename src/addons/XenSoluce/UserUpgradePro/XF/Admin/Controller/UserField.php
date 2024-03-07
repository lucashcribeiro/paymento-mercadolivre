<?php

namespace XenSoluce\UserUpgradePro\XF\Admin\Controller;

use XF\Mvc\ParameterBag;
use XF\Mvc\FormAction;

class UserField extends XFCP_UserField
{
	protected function saveAdditionalData(FormAction $form, \XF\Entity\AbstractField $field)
	{
		$input = $this->filter(['xs_uup_enable_invoice' => 'bool']);

		$form->basicEntitySave($field, $input);

		return parent::saveAdditionalData($form, $field);
	}
}