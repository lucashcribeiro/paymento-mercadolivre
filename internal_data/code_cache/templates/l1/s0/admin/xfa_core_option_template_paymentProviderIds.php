<?php
// FROM HASH: b7a548690b27ab65f028ae79481acc31
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:Payment', )), 'findActivePaymentProviders', array()), 'fetch', array());
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['providerId'] => $__vars['provider']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['providerId'],
				'label' => $__templater->escape($__vars['provider']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
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