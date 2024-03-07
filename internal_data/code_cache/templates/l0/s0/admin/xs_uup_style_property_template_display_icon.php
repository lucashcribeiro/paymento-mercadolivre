<?php
// FROM HASH: 5cc1c9ebf332f79d6b116b94edbe5d97
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['formBaseKey'] . '[active]',
		'selected' => $__vars['property']['property_value']['active'],
		'label' => '
		' . 'Active subscriptions' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[expired]',
		'selected' => $__vars['property']['property_value']['expired'],
		'label' => '
		' . 'Expired subscriptions' . '
	',
		'_type' => 'option',
	)), array(
		'rowclass' => $__vars['rowClass'],
		'label' => $__templater->escape($__vars['titleHtml']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['property']['description']),
	));
	return $__finalCompiled;
}
);