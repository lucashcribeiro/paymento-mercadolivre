<?php
// FROM HASH: 2c43ea1f87aca75b1fb25ecc5ca4497f
return array(
'macros' => array('check_uncheck_all' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'input' => '!',
		'type' => 'link',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['type'] == 'link') {
		$__finalCompiled .= '
		<a href="#" data-xf-click="XFACheckAll" data-input-name="' . $__templater->escape($__vars['input']) . '" data-check="true">' . 'Check all' . '</a>/<a href="#" data-xf-click="XFACheckAll" data-input-name="' . $__templater->escape($__vars['input']) . '" data-check="false">' . 'Uncheck all' . '</a>
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->button('Check all', array(
			'class' => 'u-jsOnly',
			'data-xf-click' => 'XFACheckAll',
			'data-input-name' => $__vars['input'],
			'data-check' => 'true',
		), '', array(
		)) . ' ' . $__templater->button('Uncheck all', array(
			'class' => 'u-jsOnly',
			'data-xf-click' => 'XFACheckAll',
			'data-input-name' => $__vars['input'],
			'data-check' => 'false',
		), '', array(
		)) . '
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