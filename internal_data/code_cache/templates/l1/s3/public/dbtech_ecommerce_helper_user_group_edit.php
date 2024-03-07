<?php
// FROM HASH: 0562373db9edda23a1e8f45f24450ed2
return array(
'macros' => array('usable_checkboxes' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'label' => 'Usable by user groups',
		'explain' => '',
		'id' => 'usable_user_group',
		'userGroups' => '',
		'selectedUserGroups' => '!',
		'withRow' => '1',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if (!$__vars['userGroups']) {
		$__finalCompiled .= '
		';
		$__vars['userGroupRepo'] = $__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:UserGroup', ));
		$__finalCompiled .= '
		';
		$__vars['userGroups'] = $__templater->method($__vars['userGroupRepo'], 'getUserGroupTitlePairs', array());
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
	';
	$__vars['allUserGroups'] = (($__templater->func('array_keys', array($__vars['userGroups'], ), false) == $__vars['selectedUserGroups']) OR $__templater->func('in_array', array('-1', $__vars['selectedUserGroups'], ), false));
	$__finalCompiled .= '

	';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroupId'] => $__vars['userGroupTitle']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['userGroupId'],
				'selected' => ($__templater->func('in_array', array($__vars['userGroupId'], $__vars['selectedUserGroups'], ), false) OR $__vars['allUserGroups']),
				'label' => '
								' . $__templater->escape($__vars['userGroupTitle']) . '
							',
				'_type' => 'option',
			);
		}
	}
	$__vars['inner'] = $__templater->preEscaped('
		' . $__templater->formRadio(array(
		'name' => $__vars['id'],
		'id' => $__vars['id'],
	), array(array(
		'value' => 'all',
		'selected' => $__vars['allUserGroups'],
		'label' => 'All user groups',
		'_type' => 'option',
	),
	array(
		'value' => 'sel',
		'selected' => !$__vars['allUserGroups'],
		'label' => 'Selected user groups' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
					' . $__templater->formCheckBox(array(
		'name' => ($__vars['id'] . '_ids'),
		'listclass' => 'listColumns',
	), $__compilerTemp1) . '

					' . $__templater->formCheckBox(array(
	), array(array(
		'data-xf-init' => 'check-all',
		'data-container' => ('#' . $__vars['id']),
		'label' => 'Select all',
		'_type' => 'option',
	))) . '
				'),
		'_type' => 'option',
	))) . '
	');
	$__finalCompiled .= '

	';
	if ($__vars['withRow']) {
		$__finalCompiled .= '
		' . $__templater->formRow('
			' . $__templater->filter($__vars['inner'], array(array('raw', array()),), true) . '
		', array(
			'label' => $__templater->escape($__vars['label']),
			'explain' => $__templater->escape($__vars['explain']),
			'name' => $__vars['id'],
			'id' => $__vars['id'],
		)) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->filter($__vars['inner'], array(array('raw', array()),), true) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'additional_checkboxes' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'label' => 'Additional user groups',
		'explain' => '',
		'id' => 'extra_group_ids',
		'userGroups' => '',
		'selectedUserGroups' => '!',
		'withRow' => '1',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if (!$__vars['userGroups']) {
		$__finalCompiled .= '
		';
		$__vars['userGroupRepo'] = $__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:UserGroup', ));
		$__finalCompiled .= '
		';
		$__vars['userGroups'] = $__templater->method($__vars['userGroupRepo'], 'getUserGroupTitlePairs', array());
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroupId'] => $__vars['userGroupTitle']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['userGroupId'],
				'selected' => $__templater->func('in_array', array($__vars['userGroupId'], $__vars['selectedUserGroups'], ), false),
				'label' => '
						' . $__templater->escape($__vars['userGroupTitle']) . '
					',
				'_type' => 'option',
			);
		}
	}
	$__vars['inner'] = $__templater->preEscaped('
		<div id="' . $__templater->escape($__vars['id']) . '">
			' . $__templater->formCheckBox(array(
		'name' => ($__vars['id'] . '[]'),
		'listclass' => 'listColumns',
	), $__compilerTemp1) . '
			' . $__templater->formCheckBox(array(
	), array(array(
		'data-xf-init' => 'check-all',
		'data-container' => ('#' . $__vars['id']),
		'label' => 'Select all',
		'_type' => 'option',
	))) . '
		</div>
	');
	$__finalCompiled .= '

	';
	if ($__vars['withRow']) {
		$__finalCompiled .= '
		' . $__templater->formRow('
			' . $__templater->filter($__vars['inner'], array(array('raw', array()),), true) . '
		', array(
			'label' => $__templater->escape($__vars['label']),
			'explain' => $__templater->escape($__vars['explain']),
			'name' => $__vars['id'],
			'id' => $__vars['id'],
		)) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->filter($__vars['inner'], array(array('raw', array()),), true) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);