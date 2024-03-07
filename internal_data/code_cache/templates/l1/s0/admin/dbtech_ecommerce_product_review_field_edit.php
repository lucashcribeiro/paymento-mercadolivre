<?php
// FROM HASH: 527c004c557bd64ac7bcc2fa2af23a46
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['extraOptions'] = $__templater->preEscaped('
		' . $__templater->callMacro('base_custom_field_macros', 'common_options', array(
		'field' => $__vars['field'],
	), $__vars) . '
	');
	$__compilerTemp2 = array(array(
		'value' => '',
		'selected' => !$__vars['categoryIds'],
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp3 = $__templater->method($__vars['categoryTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp3)) {
		foreach ($__compilerTemp3 AS $__vars['treeEntry']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['treeEntry']['record']['category_id'],
				'label' => $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp1['displayOptions'] = $__templater->preEscaped('
		' . $__templater->formSelectRow(array(
		'name' => 'category_ids[]',
		'value' => $__vars['categoryIds'],
		'multiple' => 'multiple',
		'size' => '7',
	), $__compilerTemp2, array(
		'label' => 'Applicable categories',
	)) . '
	');
	$__finalCompiled .= $__templater->includeTemplate('base_custom_field_edit', $__compilerTemp1);
	return $__finalCompiled;
}
);