<?php
// FROM HASH: 788ceae84822d198dd46a68c4ae01ac6
return array(
'macros' => array('delete_type' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'content' => '!',
		'stateKey' => '!',
		'canHardDelete' => false,
		'typeName' => 'hard_delete',
		'reasonName' => 'reason',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['content'][$__vars['stateKey']] == 'deleted') {
		$__finalCompiled .= '
		
		';
		$__compilerTemp1 = array(array(
			'value' => '0',
			'label' => 'Keep deleted',
			'_type' => 'option',
		));
		if ($__vars['canHardDelete']) {
			$__compilerTemp1[] = array(
				'value' => '1',
				'label' => 'Permanently delete',
				'hint' => 'Selecting this option will permanently and irreversibly delete the item.',
				'_type' => 'option',
			);
		}
		$__compilerTemp1[] = array(
			'value' => '2',
			'label' => 'Undelete',
			'_type' => 'option',
		);
		$__finalCompiled .= $__templater->formRadioRow(array(
			'name' => $__vars['typeName'],
			'value' => '0',
		), $__compilerTemp1, array(
			'label' => 'Deletion type',
		)) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->callMacro('public:helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
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

	return $__finalCompiled;
}
);