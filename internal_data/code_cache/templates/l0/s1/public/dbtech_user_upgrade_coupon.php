<?php
// FROM HASH: 31fd63398688481420da02c2e51e1ad3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['coupon'] = $__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('DBTech\\UserUpgradeCoupon:Coupon', )), 'getCouponFromCookie', array());
	$__compilerTemp1 = '';
	if ($__vars['coupon']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['coupon']['title']) . '
				', array(
			'label' => 'Applied coupon',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Coupon' . '</h2>

		<div class="block-body">
			' . '' . '
			' . $__compilerTemp1 . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'coupon_code',
		'value' => ($__vars['coupon'] ? $__vars['coupon']['coupon_code'] : ''),
		'placeholder' => 'Coupon code',
	), array(
		'label' => 'Coupon code',
	)) . '

			' . $__templater->formSubmitRow(array(
		'submit' => 'Apply',
		'icon' => 'save',
	), array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('purchase/apply-coupon', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);