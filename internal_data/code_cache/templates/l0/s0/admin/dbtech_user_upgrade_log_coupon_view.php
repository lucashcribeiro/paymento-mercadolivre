<?php
// FROM HASH: a3d7cb635709fbf10f78654c78b4e52d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Coupon log entry');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				<a href="' . $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), true) . '">' . $__templater->escape($__vars['entry']['User']['username']) . '</a>
			', array(
		'label' => 'User',
	)) . '
			';
	if ($__vars['entry']['Ip']) {
		$__finalCompiled .= '
				' . $__templater->formRow('
					<a href="' . $__templater->func('link_type', array('public', 'misc/ip-info', null, array('ip' => $__templater->filter($__vars['entry']['Ip']['ip'], array(array('ip', array()),), false), ), ), true) . '" target="_blank" class="u-ltr">' . $__templater->filter($__vars['entry']['Ip']['ip'], array(array('ip', array()),), true) . '</a>
				', array(
			'label' => 'IP address',
		)) . '
			';
	}
	$__finalCompiled .= '
			' . $__templater->formRow('
				' . $__templater->func('date_dynamic', array($__vars['entry']['log_date'], array(
		'data-full-date' => 'true',
	))) . '
			', array(
		'label' => 'Date',
	)) . '

			<hr class="formRowSep" />

			';
	$__compilerTemp1 = '';
	if ($__vars['entry']['Coupon']) {
		$__compilerTemp1 .= '
					<a href="' . $__templater->func('link', array('dbtech-upgrades/coupons/edit', $__vars['entry']['Coupon'], ), true) . '">' . $__templater->escape($__vars['entry']['Coupon']['title']) . '</a>
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Unknown coupon' . '
				';
	}
	$__finalCompiled .= $__templater->formRow('
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Coupon',
	)) . '
			' . $__templater->formRow('
				' . $__templater->filter($__vars['entry']['coupon_discounts'], array(array('currency', array($__vars['entry']['currency'], )),), true) . '
			', array(
		'label' => 'Discount',
	)) . '

			';
	$__compilerTemp2 = '';
	if ($__vars['entry']['Upgrade']) {
		$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('user-upgrades/edit', $__vars['entry']['Upgrade'], ), true) . '">' . $__templater->escape($__vars['entry']['Upgrade']['title']) . '</a>
				';
	} else {
		$__compilerTemp2 .= '
					' . 'Unknown user upgrade' . '
				';
	}
	$__finalCompiled .= $__templater->formRow('
				' . $__compilerTemp2 . '
			', array(
		'label' => 'User upgrade',
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);