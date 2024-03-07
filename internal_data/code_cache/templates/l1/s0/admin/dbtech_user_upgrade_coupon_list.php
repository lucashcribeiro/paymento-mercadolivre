<?php
// FROM HASH: 1b479515928a31899252392c03dd8610
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Coupons');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Bulk Upload Coupon', array(
		'href' => $__templater->func('link', array('dbtech-upgrades/coupons/bulkadd', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
' . $__templater->button('Add coupon', array(
		'href' => $__templater->func('link', array('dbtech-upgrades/coupons/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['coupons'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-outer">
			' . $__templater->callMacro('filter_macros', 'quick_filter', array(
			'key' => 'dbtech-upgrades/coupons',
			'class' => 'block-outer-opposite',
		), $__vars) . '
		</div>
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['coupons'])) {
			foreach ($__vars['coupons'] AS $__vars['coupon']) {
				$__compilerTemp1 .= '
						';
				$__compilerTemp2 = '';
				if ($__vars['coupon']['coupon_state'] == 'visible') {
					$__compilerTemp2 .= '
										' . 'Valid from ' . $__templater->func('date_time', array($__vars['coupon']['start_date'], ), true) . ' until ' . $__templater->func('date_time', array($__vars['coupon']['expiry_date'], ), true) . '' . '
									';
				} else if ($__vars['coupon']['coupon_state'] == 'deleted') {
					$__compilerTemp2 .= '
										' . $__templater->callMacro('public:deletion_macros', 'notice', array(
						'log' => $__vars['coupon']['DeletionLog'],
					), $__vars) . '
									';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
					'rowclass' => (($__vars['coupon']['coupon_state'] == 'deleted') ? 'dataList-row--deleted' : ''),
				), array(array(
					'hash' => $__vars['coupon']['coupon_id'],
					'href' => $__templater->func('link', array('dbtech-upgrades/coupons/edit', $__vars['coupon'], ), false),
					'label' => $__templater->escape($__vars['coupon']['title']),
					'hint' => $__templater->escape($__vars['coupon']['coupon_code']),
					'explain' => '
									' . $__compilerTemp2 . '				
								',
					'_type' => 'main',
					'html' => '',
				),
				array(
					'class' => ($__vars['customPermissions'][$__vars['coupon']['coupon_id']] ? 'dataList-cell--highlighted' : ''),
					'href' => $__templater->func('link', array('dbtech-upgrades/coupons/permissions', $__vars['coupon'], ), false),
					'_type' => 'action',
					'html' => '
								' . 'Permissions' . '
							',
				),
				array(
					'href' => $__templater->func('link', array('dbtech-upgrades/coupons/add', null, array('source_coupon_id' => $__vars['coupon']['coupon_id'], ), ), false),
					'_type' => 'action',
					'html' => '
								' . 'Copy' . '
							',
				),
				array(
					'href' => $__templater->func('link', array('dbtech-upgrades/logs/coupons', null, array('criteria' => array('coupon_id' => $__vars['coupon']['coupon_id'], ), ), ), false),
					'class' => 'u-hideMedium',
					'_type' => 'action',
					'html' => 'View usage',
				),
				array(
					'href' => $__templater->func('link', array('dbtech-upgrades/coupons/delete', $__vars['coupon'], ), false),
					'_type' => 'delete',
					'html' => '',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__compilerTemp1 . '
				', array(
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['coupons'], ), true) . '</span>
			</div>
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'No items have been created yet.' . '</div>
';
	}
	return $__finalCompiled;
}
);