<?php
// FROM HASH: 82e5c29849ecc279ca6c5cd742423a9c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Invoice list');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['active'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">' . 'Purchased upgrades' . '</h2>
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['active'])) {
			foreach ($__vars['active'] AS $__vars['upgrade']) {
				$__compilerTemp1 .= '
						';
				$__compilerTemp2 = '';
				if (!$__vars['upgrade']['end_date']) {
					$__compilerTemp2 .= '
									' . 'Permanent' . '
									';
				} else {
					$__compilerTemp2 .= '
									' . $__templater->func('date_dynamic', array($__vars['upgrade']['end_date'], array(
					))) . '
								';
				}
				$__compilerTemp3 = '';
				if ($__templater->method($__vars['upgrade']['Upgrade'], 'canRenew', array())) {
					$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('renew-sub/renew', $__vars['upgrade']['Upgrade'], ), true) . '" data-xf-click="overlay">
										' . $__templater->fontAwesome('fas fa-sync', array(
					)) . '
									</a>
									';
				} else {
					$__compilerTemp3 .= '
									' . $__templater->fontAwesome('fas fa-times', array(
					)) . '
								';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
				), array(array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['upgrade']['Upgrade']['title']),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['upgrade']['Upgrade']['cost_amount']) . ' ' . $__templater->escape($__vars['upgrade']['Upgrade']['cost_currency']),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['upgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'href' => $__templater->func('link', array('user-upgrade-invoice/invoice-active', $__vars['upgrade'], ), false),
					'_type' => 'cell',
					'html' => '
								' . 'View invoice' . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp3 . '
							',
				))) . '
					';
			}
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
			'html' => 'Cost',
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
			'html' => 'View invoice',
		),
		array(
			'_type' => 'cell',
			'html' => 'Renew',
		))) . '
					</thead>
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['expired'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">' . 'Expired upgrades' . '</h2>
			<div class="block-body">
				';
		$__compilerTemp4 = '';
		if ($__templater->isTraversable($__vars['expired'])) {
			foreach ($__vars['expired'] AS $__vars['upgrade']) {
				$__compilerTemp4 .= '
						';
				$__compilerTemp5 = '';
				if (!$__vars['upgrade']['end_date']) {
					$__compilerTemp5 .= '
									' . 'Permanent' . '
									';
				} else {
					$__compilerTemp5 .= '
									' . $__templater->func('date_dynamic', array($__vars['upgrade']['end_date'], array(
					))) . '
								';
				}
				$__compilerTemp6 = '';
				if ($__templater->method($__vars['upgrade']['Upgrade'], 'canRenewExpired', array($__vars['upgrade']['user_upgrade_id'], ))) {
					$__compilerTemp6 .= '
									<a href="' . $__templater->func('link', array('renew-sub/renew-expired', $__vars['upgrade']['Upgrade'], ), true) . '" data-xf-click="overlay">
										' . $__templater->fontAwesome('fas fa-sync', array(
					)) . '
									</a>
									';
				} else {
					$__compilerTemp6 .= '
									' . $__templater->fontAwesome('fas fa-check', array(
					)) . '
								';
				}
				$__compilerTemp4 .= $__templater->dataRow(array(
				), array(array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['upgrade']['Upgrade']['title']),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['upgrade']['Upgrade']['cost_amount']) . ' ' . $__templater->escape($__vars['upgrade']['Upgrade']['cost_currency']),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['upgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp5 . '
							',
				),
				array(
					'href' => $__templater->func('link', array('user-upgrade-invoice/invoice-expired', $__vars['upgrade'], ), false),
					'_type' => 'cell',
					'html' => '
								' . 'View invoice' . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp6 . '
							',
				))) . '
					';
			}
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
			'html' => 'Cost',
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
			'html' => 'View invoice',
		),
		array(
			'_type' => 'cell',
			'html' => 'Renew',
		))) . '
					</thead>
					' . $__compilerTemp4 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
		</div>
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['expiredPage'],
			'total' => $__vars['expiredTotal'],
			'link' => 'user-upgrade-invoice',
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['expiredPerPage'],
		))) . '
	</div>
';
	}
	return $__finalCompiled;
}
);