<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\XF\Admin\Controller;

use XF\Entity\OptionGroup;
use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

class Option extends XFCP_Option
{
	protected function preDispatchController($action, ParameterBag $params)
	{
		$this->assertAdminPermission('option');
	}

	public function actionFind(ParameterBag $parameterBag)
	{
	    $groupId = $parameterBag->get('option_id');

		$optionRepo = $this->getOptionRepo();

		$groups = $optionRepo
            ->findOptionGroupList()
            ->where('group_id', 'LIKE', $groupId.'%')
            ->fetch();

		$viewParams = [
			'groups' => $groups,
			'canAdd' => false
		];
		return $this->view('XF:Option\GroupList', 'option_group_list', $viewParams);
	}

	/**
	 * @return \XF\Repository\Option
	 */
	protected function getOptionRepo()
	{
		return $this->repository('XF:Option');
	}
}