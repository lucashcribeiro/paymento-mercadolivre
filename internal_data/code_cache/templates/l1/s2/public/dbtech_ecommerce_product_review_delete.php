<?php
// FROM HASH: ea88e7deda716e3b011d0661c6007f12
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete review');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['product'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['review'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp1 .= '
				' . $__templater->callMacro('helper_action', 'author_alert', array(), $__vars) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('helper_action', 'delete_type', array(
		'canHardDelete' => $__templater->method($__vars['review'], 'canDelete', array('hard', )),
	), $__vars) . '

			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('dbtech-ecommerce/review/delete', $__vars['review'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);