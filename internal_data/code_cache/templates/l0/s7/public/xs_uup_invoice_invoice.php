<?php
// FROM HASH: 1ab9d0f89c452a9fb45a8c2b96911cbe
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Invoice');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Invoice list'), $__templater->func('link', array('user-upgrade-invoice', ), false), array(
	));
	$__finalCompiled .= '

';
	$__templater->includeCss('xs_uup_invoice_invoice.less');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container xs-uup-invoice">
		<div class="block-body">
			<div class="xs-uup-invoice-header">
				<div class="xs-uup-invoice-header-inner">
					';
	if (!$__vars['xf']['options']['xs_uup_delete_the_invoice_number']) {
		$__finalCompiled .= '
						<span class="xs-uup-invoice-header-number-invoice">
							' . 'Invoice #' . $__templater->escape($__vars['upgrade']['user_upgrade_record_id']) . '
						</span>
					';
	}
	$__finalCompiled .= '
					
					<img src="' . $__templater->escape($__vars['xf']['options']['xs_uup_invoice_logo']) . '" class="xs-uup-invoice-header-logo">
				</div>
				<div class="xs-uup-invoice-header-inner xs-uup-invoice-header-end">
					<span>
						<b>' . 'User' . $__vars['xf']['language']['label_separator'] . '</b> ' . $__templater->escape($__vars['upgrade']['User']['username']) . '
						';
	if ($__templater->isTraversable($__vars['fieldFinder'])) {
		foreach ($__vars['fieldFinder'] AS $__vars['fieldId'] => $__vars['field']) {
			$__finalCompiled .= '
							';
			if ($__vars['userField']['custom_fields'][$__vars['field']['field_id']]) {
				$__finalCompiled .= '
								<div class="xs-uup-invoice-field">
									<b>' . $__templater->escape($__vars['field']['title']) . ':</b> ' . $__templater->escape($__vars['userField']['custom_fields'][$__vars['field']['field_id']]) . '
								</div>
							';
			}
			$__finalCompiled .= '
						';
		}
	}
	$__finalCompiled .= '
					</span>
					<div class="xs-uup-invoice-header-campany-detail">
						<div class="xs-uup-invoice-header-campany-header">
							' . 'Campany details' . '
						</div>
						' . $__templater->filter($__vars['CompanyDetail'], array(array('raw', array()),), true) . '
					</div>
				</div>
			</div>
			';
	$__compilerTemp1 = '';
	if (!$__vars['upgrade']['end_date']) {
		$__compilerTemp1 .= '
							' . 'Permanent' . '
							';
	} else {
		$__compilerTemp1 .= '
							' . $__templater->func('date_dynamic', array($__vars['upgrade']['end_date'], array(
		))) . '
						';
	}
	$__finalCompiled .= $__templater->dataList('
				<thead>
					' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => 'Title',
	),
	array(
		'_type' => 'cell',
		'html' => 'Description',
	),
	array(
		'_type' => 'cell',
		'html' => 'Start date',
	),
	array(
		'_type' => 'cell',
		'html' => 'End date',
	),
	array(
		'_type' => 'cell',
		'html' => 'Cost',
	))) . '
				</thead>
				' . $__templater->dataRow(array(
	), array(array(
		'_type' => 'cell',
		'html' => $__templater->escape($__vars['upgrade']['Upgrade']['title']),
	),
	array(
		'_type' => 'cell',
		'html' => $__templater->escape($__vars['upgrade']['Upgrade']['description']),
	),
	array(
		'_type' => 'cell',
		'html' => $__templater->func('date_dynamic', array($__vars['upgrade']['start_date'], array(
	))),
	),
	array(
		'_type' => 'cell',
		'html' => '
						' . $__compilerTemp1 . '
					',
	),
	array(
		'_type' => 'cell',
		'html' => $__templater->escape($__vars['upgrade']['Upgrade']['cost_amount']) . ' ' . $__templater->escape($__vars['upgrade']['Upgrade']['cost_currency']),
	))) . '
			', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
			<div class="xs-uup-invoice-footer">
				<div class="xs-uup-invoice-footer-inner">
					<span class="xs-uup-invoice-footer-total">
						<b>' . 'Total' . $__vars['xf']['language']['label_separator'] . '</b> ' . $__templater->escape($__vars['upgrade']['Upgrade']['cost_amount']) . ' ' . $__templater->escape($__vars['upgrade']['Upgrade']['cost_currency']) . '
					</span>
					<div class="xs-uup-invoice-footer-payment-method">
						<div class="xs-uup-invoice-footer-payment-method-title">' . 'Payment method' . '</div>
						' . ($__vars['upgrade']['PurchaseRequest']['provider_id'] ? $__templater->escape($__vars['upgrade']['PurchaseRequest']['provider_id']) : 'N/A') . '
					</div>
				</div>
			</div>
			<div class="xs-uup-invoice-footer-end">
				' . $__templater->filter($__vars['FooterBlock'], array(array('raw', array()),), true) . '
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);