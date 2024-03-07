<?php
// FROM HASH: 92cdfc428a1a81df1f45583579c7d0e4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => 'None',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XFRM:ResourcePrefix', )), 'findPrefixesForList', array()), 'fetch', array());
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['prefixId'] => $__vars['prefix']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['prefixId'],
				'label' => $__templater->escape($__vars['prefix']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => $__vars['inputName'],
		'value' => $__vars['option']['option_value'],
	), $__compilerTemp1, array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
	));
	return $__finalCompiled;
}
);