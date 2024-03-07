<?php
// FROM HASH: ce7d5ba9a65078fc12f2fca84065e116
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['repo'] = $__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XenSoluce\\UserUpgradePro:ExpiringUserUpgrade', ));
	$__finalCompiled .= '
';
	$__vars['userUpgrades'] = $__templater->method($__vars['repo'], 'getUserUpgrade', array());
	$__finalCompiled .= '
';
	$__vars['payments'] = $__templater->method($__vars['repo'], 'getPayments', array());
	$__finalCompiled .= '
';
	$__vars['upgrades'] = $__templater->method($__vars['repo'], 'getUpgrades', array());
	$__finalCompiled .= '
';
	$__compilerTemp1 = array(array(
		'name' => 'user_criteria[xs_uup_hauu][rule]',
		'value' => 'xs_uup_hauu',
		'selected' => $__vars['criteria']['xs_uup_hauu'],
		'label' => 'User has active user upgrades',
		'_type' => 'option',
	)
,array(
		'name' => 'user_criteria[xs_uup_hnauu][rule]',
		'value' => 'xs_uup_hnauu',
		'selected' => $__vars['criteria']['xs_uup_hnauu'],
		'label' => 'User has no active user upgrades',
		'_type' => 'option',
	)
,array(
		'name' => 'user_criteria[xs_uup_huenxd][rule]',
		'value' => 'xs_uup_huenxd',
		'selected' => $__vars['criteria']['xs_uup_huenxd'],
		'label' => 'User has a user upgrade expiring within the next X days',
		'_dependent' => array('	
			' . $__templater->formNumberBox(array(
		'name' => 'user_criteria[xs_uup_huenxd][data][value_xs_uup_huenxd]',
		'value' => $__vars['criteria']['xs_uup_huenxd']['value_xs_uup_huenxd'],
	)) . '
		'),
		'_type' => 'option',
	)
,array(
		'name' => 'user_criteria[xs_uup_hlxeuu][rule]',
		'value' => 'xs_uup_hlxeuu',
		'selected' => $__vars['criteria']['xs_uup_hlxeuu'],
		'label' => 'User has at least X expired user upgrades',
		'_dependent' => array('	
			' . $__templater->formNumberBox(array(
		'name' => 'user_criteria[xs_uup_hlxeuu][data][value_xs_uup_hlxeuu]',
		'value' => $__vars['criteria']['xs_uup_hlxeuu']['value_xs_uup_hlxeuu'],
	)) . '
		'),
		'_type' => 'option',
	)
,array(
		'name' => 'user_criteria[xs_uup_hnmtxeuu][rule]',
		'value' => 'xs_uup_hnmtxeuu',
		'selected' => $__vars['criteria']['xs_uup_hnmtxeuu'],
		'label' => 'User has no more than X expired user upgrades',
		'_dependent' => array('	
			' . $__templater->formNumberBox(array(
		'name' => 'user_criteria[xs_uup_hnmtxeuu][data][value_xs_uup_hnmtxeuu]',
		'value' => $__vars['criteria']['xs_uup_hnmtxeuu']['value_xs_uup_hnmtxeuu'],
	)) . '
		'),
		'_type' => 'option',
	));
	if (!$__templater->test($__vars['userUpgrades'], 'empty', array())) {
		$__compilerTemp2 = array();
		if ($__templater->isTraversable($__vars['userUpgrades'])) {
			foreach ($__vars['userUpgrades'] AS $__vars['userUpgrade']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['userUpgrade']['user_upgrade_id'],
					'label' => $__templater->escape($__vars['userUpgrade']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1[] = array(
			'name' => 'user_criteria[xs_uup_halxauuisp][rule]',
			'value' => 'xs_uup_halxauuisp',
			'selected' => $__vars['criteria']['xs_uup_halxauuisp'],
			'label' => 'User has at least X active user upgrades in all of the selected user upgrades',
			'_dependent' => array($__templater->formNumberBox(array(
			'name' => 'user_criteria[xs_uup_halxauuisp][data][value_xs_uup_halxauuisp]',
			'value' => $__vars['criteria']['xs_uup_halxauuisp']['value_xs_uup_halxauuisp'],
		)), $__templater->formSelect(array(
			'name' => 'user_criteria[xs_uup_halxauuisp][data][user_upgrade_id_halxauuisp]',
			'multiple' => 'true',
			'size' => '5',
			'value' => $__vars['criteria']['xs_uup_halxauuisp']['user_upgrade_id_halxauuisp'],
		), $__compilerTemp2)),
			'_type' => 'option',
		);
	}
	if (!$__templater->test($__vars['userUpgrades'], 'empty', array())) {
		$__compilerTemp3 = array();
		if ($__templater->isTraversable($__vars['userUpgrades'])) {
			foreach ($__vars['userUpgrades'] AS $__vars['userUpgrade']) {
				$__compilerTemp3[] = array(
					'value' => $__vars['userUpgrade']['user_upgrade_id'],
					'label' => $__templater->escape($__vars['userUpgrade']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1[] = array(
			'name' => 'user_criteria[xs_uup_halxuuiosp][rule]',
			'value' => 'xs_uup_halxuuiosp',
			'selected' => $__vars['criteria']['xs_uup_halxuuiosp'],
			'label' => 'User has at least X expired user upgrades in all of the selected user upgrades',
			'_dependent' => array($__templater->formNumberBox(array(
			'name' => 'user_criteria[xs_uup_halxuuiosp][data][value_xs_uup_halxuuiosp]',
			'value' => $__vars['criteria']['xs_uup_halxuuiosp']['value_xs_uup_halxuuiosp'],
		)), $__templater->formSelect(array(
			'name' => 'user_criteria[xs_uup_halxuuiosp][data][user_upgrade_id_halxuuiosp]',
			'multiple' => 'true',
			'size' => '5',
			'value' => $__vars['criteria']['xs_uup_halxuuiosp']['user_upgrade_id_halxuuiosp'],
		), $__compilerTemp3)),
			'_type' => 'option',
		);
	}
	if (!$__templater->test($__vars['upgrades'], 'empty', array())) {
		$__compilerTemp4 = array();
		if ($__templater->isTraversable($__vars['upgrades'])) {
			foreach ($__vars['upgrades'] AS $__vars['upgrade']) {
				$__compilerTemp4[] = array(
					'value' => $__vars['upgrade']['user_upgrade_id'],
					'label' => $__templater->escape($__vars['upgrade']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1[] = array(
			'name' => 'user_criteria[xs_uup_hpaotsuu][rule]',
			'value' => 'xs_uup_hpaotsuu',
			'selected' => $__vars['criteria']['xs_uup_hpaotsuu'],
			'label' => 'User has purchased at least X user upgrades in all of the selected user upgrades',
			'_dependent' => array($__templater->formNumberBox(array(
			'name' => 'user_criteria[xs_uup_hpaotsuu][data][value_xs_uup_hpaotsuu]',
			'value' => $__vars['criteria']['xs_uup_hpaotsuu']['value_xs_uup_hpaotsuu'],
		)), $__templater->formSelect(array(
			'name' => 'user_criteria[xs_uup_hpaotsuu][data][upgrade_xs_uup_hpaotsuu]',
			'multiple' => 'true',
			'size' => '5',
			'value' => $__vars['criteria']['xs_uup_hpaotsuu']['upgrade_xs_uup_hpaotsuu'],
		), $__compilerTemp4)),
			'_type' => 'option',
		);
	}
	if (!$__templater->test($__vars['payments'], 'empty', array())) {
		$__compilerTemp5 = array(array(
			'value' => '0',
			'label' => 'Manual upgrade',
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['payments'])) {
			foreach ($__vars['payments'] AS $__vars['payment']) {
				$__compilerTemp5[] = array(
					'value' => $__vars['payment']['payment_profile_id'],
					'label' => $__templater->escape($__vars['payment']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1[] = array(
			'name' => 'user_criteria[xs_uup_hpuaospp][rule]',
			'value' => 'xs_uup_hpuaospp',
			'selected' => $__vars['criteria']['xs_uup_hpuaospp'],
			'label' => 'User has purchased through any of the selected payment profiles',
			'_dependent' => array($__templater->formSelect(array(
			'name' => 'user_criteria[xs_uup_hpuaospp][data][payment_xs_uup_hpuaospp]',
			'multiple' => 'true',
			'size' => '5',
			'value' => $__vars['criteria']['xs_uup_hpuaospp']['payment_xs_uup_hpuaospp'],
		), $__compilerTemp5)),
			'_type' => 'option',
		);
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), $__compilerTemp1, array(
	));
	return $__finalCompiled;
}
);