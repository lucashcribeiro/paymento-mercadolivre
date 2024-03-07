<?php
// FROM HASH: 93fd682537e9cd3fbb2827688b7889be
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['coupon'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add coupon');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit coupon' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['coupon']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['coupon'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('dbtech-upgrades/coupons/delete', $__vars['coupon'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['coupon'], 'isInsert', array())) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('

					<div class="inputGroup">
						' . $__templater->formNumberBox(array(
			'name' => 'length_amount',
			'value' => '7',
			'min' => '1',
			'max' => '255',
		)) . '
						<span class="inputGroup-splitter"></span>
						' . $__templater->formSelect(array(
			'name' => 'length_unit',
			'value' => 'day',
			'class' => 'input--inline',
		), array(array(
			'value' => 'day',
			'label' => 'Days',
			'_type' => 'option',
		),
		array(
			'value' => 'month',
			'label' => 'Months',
			'_type' => 'option',
		),
		array(
			'value' => 'year',
			'label' => 'Years',
			'_type' => 'option',
		))) . '
					</div>
				', array(
			'rowtype' => 'input',
			'label' => 'Valid for',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formRow('

					<div class="inputGroup">
						' . $__templater->formDateInput(array(
			'name' => 'expiry_date',
			'value' => ($__vars['coupon']['expiry_date'] ? $__templater->func('date', array($__vars['coupon']['expiry_date'], 'picker', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'picker', ), false)),
		)) . '
						<span class="inputGroup-splitter"></span>
						' . $__templater->formTextBox(array(
			'type' => 'time',
			'name' => 'expiry_time',
			'value' => ($__vars['coupon']['expiry_date'] ? $__templater->func('date', array($__vars['coupon']['expiry_date'], 'H:i', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'H:i', ), false)),
		)) . '
					</div>
				', array(
			'rowtype' => 'input',
			'label' => 'Valid to',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__templater->isTraversable($__vars['coupon']['user_upgrade_discounts'])) {
		foreach ($__vars['coupon']['user_upgrade_discounts'] AS $__vars['counter'] => $__vars['discountInfo']) {
			$__compilerTemp2 .= '
						<li class="inputPair">
							<div class="inputGroup">
								';
			$__compilerTemp3 = array(array(
				'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
				'_type' => 'option',
			));
			if ($__templater->isTraversable($__vars['userUpgrades'])) {
				foreach ($__vars['userUpgrades'] AS $__vars['userUpgrade']) {
					$__compilerTemp3[] = array(
						'value' => $__vars['userUpgrade']['user_upgrade_id'],
						'label' => $__templater->escape($__vars['userUpgrade']['title']),
						'_type' => 'option',
					);
				}
			}
			$__compilerTemp2 .= $__templater->formSelect(array(
				'name' => 'user_upgrade_discounts[' . $__vars['counter'] . '][user_upgrade_id]',
				'value' => $__vars['discountInfo']['user_upgrade_id'],
				'class' => 'filterBlock-input',
			), $__compilerTemp3) . '

								<span class="inputGroup-splitter"></span>

								' . $__templater->formNumberBox(array(
				'name' => 'user_upgrade_discounts[' . $__vars['counter'] . '][upgrade_value]',
				'min' => '0',
				'value' => $__vars['discountInfo']['upgrade_value'],
				'step' => 'any',
				'required' => false,
			)) . '
							</div>
						</li>
					';
		}
	}
	$__compilerTemp4 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['userUpgrades'])) {
		foreach ($__vars['userUpgrades'] AS $__vars['userUpgrade']) {
			$__compilerTemp4[] = array(
				'value' => $__vars['userUpgrade']['user_upgrade_id'],
				'label' => $__templater->escape($__vars['userUpgrade']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['coupon'], 'exists', array()) ? $__vars['coupon']['MasterTitle']['phrase_text'] : ''),
	), array(
		'label' => 'Title',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'coupon_code',
		'value' => $__vars['coupon']['coupon_code'],
		'maxlength' => $__templater->func('max_length', array('DBTech\\UserUpgradeCoupon:Coupon', 'coupon_code', ), false),
	), array(
		'label' => 'Coupon code',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'coupon_type',
		'value' => $__vars['coupon']['coupon_type'],
	), array(array(
		'value' => 'percent',
		'label' => 'Percent',
		'_dependent' => array('
						<div class="inputGroup">
							' . $__templater->formNumberBox(array(
		'name' => 'coupon_percent',
		'value' => $__vars['coupon']['coupon_percent'],
		'min' => '0',
		'max' => '100',
		'step' => 'any',
	)) . '
							<span class="inputGroup-text">%</span>
						</div>
					'),
		'_type' => 'option',
	),
	array(
		'value' => 'value',
		'label' => 'Flat value',
		'_dependent' => array('
						<div class="inputGroup">
							' . $__templater->formNumberBox(array(
		'name' => 'coupon_value',
		'value' => $__vars['coupon']['coupon_value'],
		'min' => '0',
		'step' => 'any',
	)) . '
						</div>
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Coupon type',
		'explain' => 'Determines what sort of discount is applied to the user upgrade; a percent off the cost, or a set discount.<br />
For the "Flat value" type, the currency is determined by the user upgrade itself.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formDateInput(array(
		'name' => 'start_date',
		'value' => ($__vars['coupon']['start_date'] ? $__templater->func('date', array($__vars['coupon']['start_date'], 'picker', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'picker', ), false)),
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->formTextBox(array(
		'type' => 'time',
		'name' => 'start_time',
		'value' => ($__vars['coupon']['start_date'] ? $__templater->func('date', array($__vars['coupon']['start_date'], 'H:i', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'H:i', ), false)),
	)) . '
				</div>
			', array(
		'label' => 'Valid from',
		'rowtype' => 'input',
	)) . '

			' . $__compilerTemp1 . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'remaining_uses',
		'value' => $__vars['coupon']['remaining_uses'],
		'min' => '-1',
		'step' => '1',
	), array(
		'label' => 'Remaining uses',
		'explain' => 'This setting determines how many uses this coupon has remaining before it is no longer available for use.<br />
-1 = Unlimited uses',
	)) . '

			' . $__templater->formRow('

				<ul class="listPlain inputPair-container">
					' . $__compilerTemp2 . '
					<li class="inputPair" data-xf-init="field-adder" data-increment-format="user_upgrade_discounts[{counter}]">
						<div class="inputGroup">
							' . $__templater->formSelect(array(
		'name' => 'user_upgrade_discounts[' . $__vars['nextCounter'] . '][user_upgrade_id]',
		'class' => 'filterBlock-input',
	), $__compilerTemp4) . '

							<span class="inputGroup-splitter"></span>

							' . $__templater->formNumberBox(array(
		'name' => 'user_upgrade_discounts[' . $__vars['nextCounter'] . '][upgrade_value]',
		'min' => '0',
		'step' => 'any',
		'required' => false,
	)) . '
						</div>
					</li>
				</ul>
			', array(
		'rowtype' => 'input',
		'label' => 'Applicable user upgrades',
		'explain' => 'Leaving the value field blank will use the "Coupon type" value chosen above.<br />
Set user upgrade to "None" to remove a row upon saving.<br />
If no user upgrades are chosen, this coupon applies to <b>all</b> user upgrades.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('dbtech-upgrades/coupons/save', $__vars['coupon'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);