<?php
// FROM HASH: 6fb45ab903031da152648ce56f620ba4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Watched products');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['products'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['products'])) {
			foreach ($__vars['products'] AS $__vars['product']) {
				$__compilerTemp1 .= '
						';
				$__vars['extra'] = ($__vars['product']['Watch'][$__vars['xf']['visitor']['user_id']]['email_subscribe'] ? 'Email' : '');
				$__compilerTemp1 .= '
						' . $__templater->callMacro('dbtech_ecommerce_product_list_macros', 'product', array(
					'product' => $__vars['product'],
					'chooseName' => 'ids',
					'showWatched' => false,
					'extraInfo' => $__vars['extra'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'watched/ecommerce-products',
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '

			<div class="block-outer-opposite">
				' . $__templater->button('Manage watched products', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h3 class="menu-header">' . 'Manage watched products' . '</h3>
						' . '
						<a href="' . $__templater->func('link', array('watched/ecommerce-products/manage', null, array('state' => 'email_subscribe:off', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Disable email notification' . '</a>
						<a href="' . $__templater->func('link', array('watched/ecommerce-products/manage', null, array('state' => 'delete', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Stop watching products' . '</a>
						' . '
					</div>
				</div>
			</div>
		</div>

		<div class="block-container">
			<div class="block-body">
				<div class="structItemContainer">
					' . $__compilerTemp1 . '
				</div>
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter"></span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '< .block-container',
			'label' => 'Select all',
			'_type' => 'option',
		))) . '</span>
				<span class="block-footer-controls">
					' . $__templater->formSelect(array(
			'name' => 'watch_action',
			'class' => 'input--inline',
		), array(array(
			'label' => 'With selected' . $__vars['xf']['language']['ellipsis'],
			'_type' => 'option',
		),
		array(
			'value' => 'email_subscribe:on',
			'label' => 'Enable email notification',
			'_type' => 'option',
		),
		array(
			'value' => 'email_subscribe:off',
			'label' => 'Disable email notification',
			'_type' => 'option',
		),
		array(
			'value' => 'delete',
			'label' => 'Stop watching',
			'_type' => 'option',
		))) . '
					' . $__templater->button('Go', array(
			'type' => 'submit',
			'accesskey' => 's',
		), '', array(
		)) . '
				</span>
			</div>
		</div>

		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
			'link' => 'watched/ecommerce-products',
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'perPage' => $__vars['perPage'],
		))) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('watched/ecommerce-products/update', ), false),
			'ajax' => 'true',
			'class' => 'block',
			'autocomplete' => 'off',
		)) . '
	';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">
		';
		if ($__vars['page'] > 1) {
			$__finalCompiled .= '
			' . 'There are no products to display.' . '
			';
		} else {
			$__finalCompiled .= '
			' . 'You are not watching any products.' . '
		';
		}
		$__finalCompiled .= '
	</div>
';
	}
	return $__finalCompiled;
}
);