<?php
// FROM HASH: 6e0a2b0dfb821194833ffac7a69ec51a
return array(
'macros' => array('product' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'product' => '!',
		'filters' => array(),
		'baseLinkPath' => '',
		'category' => null,
		'showWatched' => true,
		'showOwner' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('dbtech_ecommerce.less');
	$__finalCompiled .= '

	<div class="productList-product structItem structItem--product ' . ($__vars['product']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['product']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['product'], 'isIgnored', array()) ? 'is-ignored' : '') . ' ' . (($__vars['product']['product_state'] == 'moderated') ? 'is-moderated' : '') . ' ' . (($__vars['product']['product_state'] == 'deleted') ? 'is-deleted' : '') . ' js-inlineModContainer js-productListItem-' . $__templater->escape($__vars['product']['product_id']) . '" data-author="' . ($__templater->escape($__vars['product']['User']['username']) ?: $__templater->escape($__vars['product']['username'])) . '" data-xf-init="touch-proxy">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded">
			';
	if ($__vars['product']['Sale']) {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '"><div class="ribbon ribbon--sale"><span>' . 'Sale' . '</span></div></a>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-iconContainer">
				' . $__templater->func('dbtech_ecommerce_product_icon', array($__vars['product'], 's', $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), false), ), true) . '
				';
	if ($__vars['showOwner']) {
		$__finalCompiled .= '
				' . $__templater->func('avatar', array($__vars['product']['User'], 's', false, array(
			'href' => '',
			'class' => 'avatar--separated structItem-secondaryIcon',
		))) . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['product']['is_featured']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--attention" aria-hidden="true" title="' . $__templater->filter('Featured', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Featured' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['product']['product_state'] == 'moderated') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Awaiting approval', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Awaiting approval' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['product']['product_state'] == 'deleted') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Deleted' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
						';
		if ($__vars['product']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Product watched', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Product watched' . '</span>
							</li>
						';
		} else if ((!$__vars['category']) AND $__vars['product']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Category watched', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Category watched' . '</span>
							</li>
						';
		}
		$__compilerTemp1 .= '
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="structItem-statuses">
				' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-title">
				';
	if ($__vars['product']['prefix_id']) {
		$__finalCompiled .= '
					';
		if ($__vars['category']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('dbtech-ecommerce/categories', $__vars['category'], array('prefix_id' => $__vars['product']['prefix_id'], ), ), true) . '" class="labelLink">' . $__templater->func('prefix', array('dbtechEcommerceProduct', $__vars['product'], 'html', '', ), true) . '</a>
					';
		} else {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('dbtech-ecommerce', null, array('prefix_id' => $__vars['product']['prefix_id'], ), ), true) . '" class="labelLink">' . $__templater->func('prefix', array('dbtechEcommerceProduct', $__vars['product'], 'html', '', ), true) . '</a>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" data-tp-primary="on">
					' . $__templater->escape($__vars['product']['title']) . '
					';
	if ($__templater->method($__vars['product'], 'hasDownloadFunctionality', array()) AND !$__templater->test($__vars['product']['LatestVersion'], 'empty', array())) {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('dbtech-ecommerce/release', $__vars['product']['LatestVersion'], ), true) . '" class="u-concealed">
							<span class="u-muted">' . $__templater->escape($__vars['product']['LatestVersion']['version_string']) . '</span>
						</a>
					';
	}
	$__finalCompiled .= '
				</a>
				';
	if (!$__templater->test($__vars['product']['cost_cache'], 'empty', array())) {
		$__finalCompiled .= '
					';
		$__vars['startingRenewalCost'] = $__templater->method($__templater->method($__vars['product'], 'getStartingCost', array()), 'getDigitalRenewalPrice', array($__vars['license'], true, true, ));
		$__finalCompiled .= '

					';
		if ($__vars['product']['Sale']) {
			$__finalCompiled .= '
						<span class="label label--lightGreen label--smallest" data-xf-init="tooltip" title="' . $__templater->filter('Renewal cost from: ' . $__vars['startingRenewalCost'] . '', array(array('for_attr', array()),), true) . '">
							' . (($__templater->func('count', array($__vars['product']['cost_cache'], ), false) > 1) ? 'From' . $__vars['xf']['language']['label_separator'] : '') . '
							' . (($__vars['product']['starting_price'] == 0) ? 'Free' : '' . $__templater->filter($__vars['product']['starting_price'], array(array('currency', array($__vars['xf']['options']['dbtechEcommerceCurrency'], )),), true) . ' (Save ' . $__templater->filter($__templater->method($__vars['product'], 'getStartingPrice', array(null, false, )) - $__vars['product']['starting_price'], array(array('currency', array($__vars['xf']['options']['dbtechEcommerceCurrency'], )),), true) . ')') . '
						</span>
					';
		} else {
			$__finalCompiled .= '
						<span class="label label--primary label--smallest" data-xf-init="tooltip" title="' . $__templater->filter('Renewal cost from: ' . $__vars['startingRenewalCost'] . '', array(array('for_attr', array()),), true) . '">
							' . (($__templater->func('count', array($__vars['product']['cost_cache'], ), false) > 1) ? 'From' . $__vars['xf']['language']['label_separator'] : '') . '
							' . (($__vars['product']['starting_price'] == 0) ? 'Free' : $__templater->filter($__vars['product']['starting_price'], array(array('currency', array($__vars['xf']['options']['dbtechEcommerceCurrency'], )),), true)) . '
						</span>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['extraInfo']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['chooseName']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['product']['product_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
						';
	} else if ($__vars['allowInlineMod'] AND $__templater->method($__vars['product'], 'canUseInlineModeration', array())) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['product']['product_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '</li>
						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
					' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['product']['product_state'] == 'deleted') {
		$__finalCompiled .= '
					';
		if ($__vars['extraInfo']) {
			$__finalCompiled .= '<span class="structItem-extraInfo">' . $__templater->escape($__vars['extraInfo']) . '</span>';
		}
		$__finalCompiled .= '

					' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['product']['DeletionLog'],
		), $__vars) . '
				';
	} else {
		$__finalCompiled .= '
					<ul class="structItem-parts structItem-parts--product">
						';
		if ($__vars['showOwner']) {
			$__finalCompiled .= '
							<li>' . $__templater->func('username_link', array($__vars['product']['User'], false, array(
				'defaultname' => $__vars['product']['username'],
			))) . '</li>
						';
		}
		$__finalCompiled .= '
						';
		if (!$__templater->test($__vars['product']['product_filters'], 'empty', array())) {
			$__finalCompiled .= '
							';
			if ($__templater->isTraversable($__vars['product']['product_filters'])) {
				foreach ($__vars['product']['product_filters'] AS $__vars['filter']) {
					$__finalCompiled .= '
								<li>
									';
					if (!$__templater->test($__vars['baseLinkPath'], 'empty', array())) {
						$__finalCompiled .= '
										<a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('platform', $__vars['filter'], )),), false), ), true) . '" class="u-concealed">' . $__templater->escape($__vars['product']['Category']['product_filters'][$__vars['filter']]) . '</a>
									';
					} else {
						$__finalCompiled .= '
										' . $__templater->escape($__vars['product']['Category']['product_filters'][$__vars['filter']]) . '
									';
					}
					$__finalCompiled .= '
								</li>
							';
				}
			}
			$__finalCompiled .= '
						';
		}
		$__finalCompiled .= '
					</ul>
				';
	}
	$__finalCompiled .= '
			</div>

			';
	if ($__vars['product']['product_state'] != 'deleted') {
		$__finalCompiled .= '
				<div class="structItem-productTagLine">' . $__templater->escape($__vars['product']['tagline']) . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
		<div class="structItem-cell structItem-cell--productMeta">
			';
	if ($__templater->method($__vars['product'], 'canPurchase', array($__vars['license'], ))) {
		$__finalCompiled .= '
				<div class="structItem-row--purchaseParent">
					';
		$__compilerTemp3 = '';
		if ($__vars['license']) {
			$__compilerTemp3 .= '
							' . 'Renew' . '
						';
		} else if (($__templater->func('count', array($__vars['product']['cost_cache'], ), false) == 1) AND ($__templater->method($__templater->method($__vars['product'], 'getStartingCost', array()), 'getPrice', array()) == 0)) {
			$__compilerTemp3 .= '
							';
			if ($__templater->method($__vars['product'], 'canPurchaseAddOns', array())) {
				$__compilerTemp3 .= '
								' . 'Get free / Purchase add-ons' . '
							';
			} else {
				$__compilerTemp3 .= '
								' . 'Get free' . '
							';
			}
			$__compilerTemp3 .= '
						';
		} else {
			$__compilerTemp3 .= '
							' . 'Purchase' . '
						';
		}
		$__finalCompiled .= $__templater->button('
						' . $__compilerTemp3 . '
					', array(
			'href' => $__templater->func('link', array('dbtech-ecommerce/purchase', $__vars['product'], ($__vars['license'] ? array('license_key' => $__vars['license']['license_key'], ) : array()), ), false),
			'class' => 'button--fullWidth button--cta',
			'icon' => 'purchase',
			'overlay' => 'true',
			'data-cache' => 'false',
		), '', array(
		)) . '
				</div>

				';
		if ($__templater->method($__vars['product'], 'canPurchaseAllAccess', array($__vars['license'], ))) {
			$__finalCompiled .= '
					<div class="structItem-row--purchaseParent">
						' . $__templater->button('
							' . 'Get via All-Access Pass' . '
						', array(
				'href' => $__templater->func('link', array('dbtech-ecommerce/purchase/all-access', $__vars['product'], ), false),
				'class' => 'button--fullWidth button--primary',
				'icon' => 'download',
			), '', array(
			)) . '
					</div>
				';
		} else if ($__vars['product']['AllAccessLicense']) {
			$__finalCompiled .= '
					<div class="structItem-row--purchaseParent">
						' . $__templater->button('
							' . 'Owned via All-Access Pass' . '
						', array(
				'href' => $__templater->func('link', array('dbtech-ecommerce/licenses/license', $__vars['product']['AllAccessLicense'], ), false),
				'class' => 'button--fullWidth button--primary is-disabled',
				'icon' => 'download',
			), '', array(
			)) . '
					</div>
				';
		}
		$__finalCompiled .= '
			';
	} else if ($__templater->method($__vars['product'], 'canPurchaseAddOns', array($__vars['license'], ))) {
		$__finalCompiled .= '
				<div class="structItem-row--purchaseParent">
					' . $__templater->button('
						' . 'Buy add-ons' . '
					', array(
			'href' => $__templater->func('link', array('dbtech-ecommerce/purchase/add-ons', $__vars['product'], ($__vars['license'] ? array('license_key' => $__vars['license']['license_key'], ) : array()), ), false),
			'icon' => 'purchase',
			'overlay' => 'true',
			'data-cache' => 'false',
		), '', array(
		)) . '
				</div>
			';
	}
	$__finalCompiled .= '

			';
	if ($__vars['xf']['options']['dbtechEcommerceEnableRate']) {
		$__finalCompiled .= '
				<div class="structItem-metaItem structItem-metaItem--rating">
					' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['product']['rating_avg'],
			'count' => $__vars['product']['rating_count'],
			'rowClass' => 'ratingStarsRow--justified',
			'starsClass' => 'ratingStars--larger',
		), $__vars) . '
				</div>
			';
	}
	$__finalCompiled .= '

			';
	if ($__templater->method($__vars['product'], 'hasDownloadFunctionality', array())) {
		$__finalCompiled .= '
				';
		if (!$__templater->test($__vars['product']['LatestVersion'], 'empty', array())) {
			$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--latestVersion">
						<dt>' . 'Latest version' . '</dt>
						<dd><a href="' . $__templater->func('link', array('dbtech-ecommerce/release', $__vars['product']['LatestVersion'], ), true) . '" class="u-concealed">' . $__templater->escape($__vars['product']['LatestVersion']['version_string']) . '</a></dd>
					</dl>

					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--lastUpdate">
						<dt>' . 'Updated' . '</dt>
						<dd><a href="' . $__templater->func('link', array('dbtech-ecommerce/releases', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['LatestVersion']['release_date'], array(
			))) . '</a></dd>
					</dl>
				';
		} else {
			$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--lastUpdate">
						<dt>' . 'Released' . '</dt>
						<dd><a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['creation_date'], array(
			))) . '</a></dd>
					</dl>
				';
		}
		$__finalCompiled .= '
			';
	} else {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--lastUpdate">
					<dt>' . 'Released' . '</dt>
					<dd><a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['creation_date'], array(
		))) . '</a></dd>
				</dl>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'product_grid' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'product' => '!',
		'filters' => array(),
		'baseLinkPath' => '',
		'category' => null,
		'showWatched' => true,
		'showOwner' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('node_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('dbtech_ecommerce.less');
	$__finalCompiled .= '

	<div class="productList-product productList-product-grid node ' . ($__vars['product']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['product']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['product'], 'isIgnored', array()) ? 'is-ignored' : '') . ' ' . (($__vars['product']['product_state'] == 'moderated') ? 'is-moderated' : '') . ' ' . (($__vars['product']['product_state'] == 'deleted') ? 'is-deleted' : '') . ' js-inlineModContainer js-productListItem-' . $__templater->escape($__vars['product']['product_id']) . '" data-author="' . ($__templater->escape($__vars['product']['User']['username']) ?: $__templater->escape($__vars['product']['username'])) . '" data-xf-init="touch-proxy">
		';
	if ($__vars['product']['Sale']) {
		$__finalCompiled .= '
			<div class="ribbon ribbon--sale"><span>' . 'Sale' . '</span></div>
		';
	}
	$__finalCompiled .= '

		';
	if ($__vars['product']['is_featured']) {
		$__finalCompiled .= '
			<div class="ribbon ribbon--featured"><span>' . 'Featured' . '</span></div>
		';
	}
	$__finalCompiled .= '

		';
	if ($__vars['allowInlineMod']) {
		$__finalCompiled .= '
			' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['product']['product_id'],
			'labelclass' => 'productList-product-gridOverlayTop',
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '
		';
	}
	$__finalCompiled .= '

		<div class="productList-product-grid--icon flex-box">
			' . $__templater->func('dbtech_ecommerce_product_icon', array($__vars['product'], 'l', $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), false), ), true) . '
		</div>

		<div class="node-main js-nodeMain">
			';
	$__vars['descriptionDisplay'] = $__templater->func('property', array('nodeListDescriptionDisplay', ), false);
	$__finalCompiled .= '
			<h3 class="node-title">
				';
	if ($__vars['product']['prefix_id']) {
		$__finalCompiled .= '
					';
		if ($__vars['category']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('dbtech-ecommerce/categories', $__vars['category'], array('prefix_id' => $__vars['product']['prefix_id'], ), ), true) . '" class="labelLink">' . $__templater->func('prefix', array('dbtechEcommerceProduct', $__vars['product'], 'html', '', ), true) . '</a>
					';
		} else {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('dbtech-ecommerce', null, array('prefix_id' => $__vars['product']['prefix_id'], ), ), true) . '" class="labelLink">' . $__templater->func('prefix', array('dbtechEcommerceProduct', $__vars['product'], 'html', '', ), true) . '</a>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" data-xf-init="' . (($__vars['descriptionDisplay'] == 'tooltip') ? 'element-tooltip' : '') . '" data-shortcut="node-description">' . $__templater->escape($__vars['product']['title']) . '</a>
			</h3>
			';
	if (($__vars['descriptionDisplay'] != 'none') AND !$__templater->test($__vars['product']['tagline'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="node-description ' . (($__vars['descriptionDisplay'] == 'tooltip') ? 'node-description--tooltip js-nodeDescTooltip' : '') . '">' . $__templater->escape($__vars['product']['tagline']) . '</div>
			';
	}
	$__finalCompiled .= '

			<div class="contentRow-minor contentRow-minor--smaller">
				';
	if ($__vars['product']['product_state'] == 'deleted') {
		$__finalCompiled .= '
					';
		if ($__vars['extraInfo']) {
			$__finalCompiled .= '<span class="structItem-extraInfo">' . $__templater->escape($__vars['extraInfo']) . '</span>';
		}
		$__finalCompiled .= '

					' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['product']['DeletionLog'],
		), $__vars) . '
				';
	} else {
		$__finalCompiled .= '
					<ul class="listInline listInline--bullet">
						';
		if ($__vars['showOwner']) {
			$__finalCompiled .= '
							<li>' . $__templater->func('username_link', array($__vars['product']['User'], false, array(
				'defaultname' => $__vars['product']['username'],
			))) . '</li>
						';
		}
		$__finalCompiled .= '

						';
		if ($__templater->method($__vars['product'], 'hasDownloadFunctionality', array()) AND !$__templater->test($__vars['product']['LatestVersion'], 'empty', array())) {
			$__finalCompiled .= '
							<li>
								<a href="' . $__templater->func('link', array('dbtech-ecommerce/release', $__vars['product']['LatestVersion'], ), true) . '" class="u-concealed">' . $__templater->escape($__vars['product']['LatestVersion']['version_string']) . '</a>
							</li>
						';
		}
		$__finalCompiled .= '

						';
		if (!$__templater->test($__vars['product']['product_filters'], 'empty', array())) {
			$__finalCompiled .= '
							';
			if ($__templater->isTraversable($__vars['product']['product_filters'])) {
				foreach ($__vars['product']['product_filters'] AS $__vars['filter']) {
					$__finalCompiled .= '
								<li>
									';
					if (!$__templater->test($__vars['baseLinkPath'], 'empty', array())) {
						$__finalCompiled .= '
										<a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('platform', $__vars['filter'], )),), false), ), true) . '" class="u-concealed">' . $__templater->escape($__vars['product']['Category']['product_filters'][$__vars['filter']]) . '</a>
									';
					} else {
						$__finalCompiled .= '
										' . $__templater->escape($__vars['product']['Category']['product_filters'][$__vars['filter']]) . '
									';
					}
					$__finalCompiled .= '
								</li>
							';
				}
			}
			$__finalCompiled .= '
						';
		}
		$__finalCompiled .= '

						';
		if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
							';
			if ($__vars['product']['Watch'][$__vars['xf']['visitor']['user_id']]) {
				$__finalCompiled .= '
								<li>
									<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Product watched', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Product watched' . '</span>
								</li>
								';
			} else if ((!$__vars['category']) AND $__vars['product']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
				$__finalCompiled .= '
								<li>
									<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Category watched', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Category watched' . '</span>
								</li>
							';
			}
			$__finalCompiled .= '
						';
		}
		$__finalCompiled .= '
					</ul>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>

		<div class="productList-product-grid--clearfix">
			';
	if ($__vars['xf']['options']['dbtechEcommerceEnableRate']) {
		$__finalCompiled .= '
				<div class="rating">
					' . $__templater->callMacro('rating_macros', 'stars', array(
			'rating' => $__vars['product']['rating_avg'],
			'rowClass' => 'ratingStarsRow--justified',
			'starsClass' => 'ratingStars--smaller',
		), $__vars) . '
				</div>
			';
	}
	$__finalCompiled .= '

			<div class="price">
				';
	if (!$__templater->test($__vars['product']['cost_cache'], 'empty', array())) {
		$__finalCompiled .= '
					';
		$__vars['startingRenewalCost'] = $__templater->method($__templater->method($__vars['product'], 'getStartingCost', array()), 'getDigitalRenewalPrice', array($__vars['license'], true, true, ));
		$__finalCompiled .= '

					';
		if ($__vars['product']['Sale']) {
			$__finalCompiled .= '
						<span class="label label--lightGreen label--smallest" data-xf-init="tooltip" title="' . $__templater->filter('Renewal cost from: ' . $__vars['startingRenewalCost'] . '', array(array('for_attr', array()),), true) . '">
							' . (($__templater->func('count', array($__vars['product']['cost_cache'], ), false) > 1) ? 'From' . $__vars['xf']['language']['label_separator'] : '') . '
							' . (($__vars['product']['starting_price'] == 0) ? 'Free' : '' . $__templater->filter($__vars['product']['starting_price'], array(array('currency', array($__vars['xf']['options']['dbtechEcommerceCurrency'], )),), true) . ' (Save ' . $__templater->filter($__templater->method($__vars['product'], 'getStartingPrice', array(null, false, )) - $__vars['product']['starting_price'], array(array('currency', array($__vars['xf']['options']['dbtechEcommerceCurrency'], )),), true) . ')') . '
						</span>
					';
		} else {
			$__finalCompiled .= '
						<span class="label label--primary label--smallest" data-xf-init="tooltip" title="' . $__templater->filter('Renewal cost from: ' . $__vars['startingRenewalCost'] . '', array(array('for_attr', array()),), true) . '">
							' . (($__templater->func('count', array($__vars['product']['cost_cache'], ), false) > 1) ? 'From' . $__vars['xf']['language']['label_separator'] : '') . '
							' . (($__vars['product']['starting_price'] == 0) ? 'Free' : $__templater->filter($__vars['product']['starting_price'], array(array('currency', array($__vars['xf']['options']['dbtechEcommerceCurrency'], )),), true)) . '
						</span>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>

		';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__templater->method($__vars['product'], 'canPurchase', array($__vars['license'], ))) {
		$__compilerTemp1 .= '
						<div class="structItem-row--purchaseParent">
							';
		$__compilerTemp2 = '';
		if ($__vars['license']) {
			$__compilerTemp2 .= '
									' . 'Renew' . '
								';
		} else if (($__templater->func('count', array($__vars['product']['cost_cache'], ), false) == 1) AND ($__templater->method($__templater->method($__vars['product'], 'getStartingCost', array()), 'getPrice', array()) == 0)) {
			$__compilerTemp2 .= '
									';
			if ($__templater->method($__vars['product'], 'canPurchaseAddOns', array())) {
				$__compilerTemp2 .= '
										' . 'Get free / Purchase add-ons' . '
									';
			} else {
				$__compilerTemp2 .= '
										' . 'Get free' . '
									';
			}
			$__compilerTemp2 .= '
								';
		} else {
			$__compilerTemp2 .= '
									' . 'Purchase' . '
								';
		}
		$__compilerTemp1 .= $__templater->button('
								' . $__compilerTemp2 . '
							', array(
			'href' => $__templater->func('link', array('dbtech-ecommerce/purchase', $__vars['product'], ($__vars['license'] ? array('license_key' => $__vars['license']['license_key'], ) : array()), ), false),
			'class' => 'button--fullWidth button--cta',
			'icon' => 'purchase',
			'overlay' => 'true',
			'data-cache' => 'false',
		), '', array(
		)) . '
						</div>

						';
		if ($__templater->method($__vars['product'], 'canPurchaseAllAccess', array($__vars['license'], ))) {
			$__compilerTemp1 .= '
							<div class="structItem-row--purchaseParent">
								' . $__templater->button('
									' . 'Get via All-Access Pass' . '
								', array(
				'href' => $__templater->func('link', array('dbtech-ecommerce/purchase/all-access', $__vars['product'], ), false),
				'class' => 'button--fullWidth button--primary',
				'icon' => 'download',
			), '', array(
			)) . '
							</div>
						';
		} else if ($__vars['product']['AllAccessLicense']) {
			$__compilerTemp1 .= '
							<div class="structItem-row--purchaseParent">
								' . $__templater->button('
									' . 'Owned via All-Access Pass' . '
								', array(
				'href' => $__templater->func('link', array('dbtech-ecommerce/licenses/license', $__vars['product']['AllAccessLicense'], ), false),
				'class' => 'button--fullWidth button--primary is-disabled',
				'icon' => 'download',
			), '', array(
			)) . '
							</div>
						';
		}
		$__compilerTemp1 .= '
					';
	} else if ($__templater->method($__vars['product'], 'canPurchaseAddOns', array($__vars['license'], ))) {
		$__compilerTemp1 .= '
						<div class="structItem-row--purchaseParent">
							' . $__templater->button('
								' . 'Buy add-ons' . '
							', array(
			'href' => $__templater->func('link', array('dbtech-ecommerce/purchase/add-ons', $__vars['product'], ($__vars['license'] ? array('license_key' => $__vars['license']['license_key'], ) : array()), ), false),
			'icon' => 'purchase',
			'overlay' => 'true',
			'data-cache' => 'false',
		), '', array(
		)) . '
						</div>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
			<div class="productList-product-grid--clearfix">
				' . $__compilerTemp1 . '
			</div>
		';
	}
	$__finalCompiled .= '

		<div class="productList-product-grid--updateInfo">
			<ul class="listInline">
				';
	if ($__templater->method($__vars['product'], 'hasDownloadFunctionality', array())) {
		$__finalCompiled .= '
					';
		if (!$__templater->test($__vars['product']['LatestVersion'], 'empty', array())) {
			$__finalCompiled .= '
						<li>' . 'Updated' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('dbtech-ecommerce/releases', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['LatestVersion']['release_date'], array(
			))) . '</a></li>
					';
		} else {
			$__finalCompiled .= '
						<li>' . 'Released' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['creation_date'], array(
			))) . '</a></li>
					';
		}
		$__finalCompiled .= '
				';
	} else {
		$__finalCompiled .= '
					<li>' . 'Released' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['creation_date'], array(
		))) . '</a></li>
				';
	}
	$__finalCompiled .= '
			</ul>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'product_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'product' => '!',
		'showOwner' => true,
		'withMeta' => true,
		'withRating' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->func('dbtech_ecommerce_product_icon', array($__vars['product'], 'xxs', $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), false), ), true) . '
		</div>
		<div class="contentRow-main contentRow-main--close">
			<a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '">' . $__templater->func('prefix', array('dbtechEcommerceProduct', $__vars['product'], ), true) . $__templater->escape($__vars['product']['title']) . '</a>
			<div class="contentRow-lesser">' . $__templater->escape($__vars['product']['tagline']) . '</div>
			';
	if ($__vars['withRating'] AND $__vars['xf']['options']['dbtechEcommerceEnableRate']) {
		$__finalCompiled .= '
				<div class="contentRow-lesser">
					' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['product']['rating_avg'],
			'count' => $__vars['product']['rating_count'],
			'rowClass' => 'ratingStarsRow--justified',
			'starsClass' => 'ratingStars--larger',
		), $__vars) . '
				</div>
			';
	}
	$__finalCompiled .= '
			';
	if ($__vars['withMeta']) {
		$__finalCompiled .= '
				<div class="contentRow-minor contentRow-minor--smaller">
					<ul class="listInline listInline--bullet">
						';
		if ($__vars['showOwner']) {
			$__finalCompiled .= '
							<li>' . ($__templater->escape($__vars['product']['User']['username']) ?: $__templater->escape($__vars['product']['username'])) . '</li>
						';
		}
		$__finalCompiled .= '

						';
		if ($__templater->method($__vars['product'], 'hasDownloadFunctionality', array())) {
			$__finalCompiled .= '
							';
			if (!$__templater->test($__vars['product']['LatestVersion'], 'empty', array())) {
				$__finalCompiled .= '
								<li>' . 'Updated' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('dbtech-ecommerce/releases', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['LatestVersion']['release_date'], array(
				))) . '</a></li>
							';
			} else {
				$__finalCompiled .= '
								<li>' . 'Released' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['creation_date'], array(
				))) . '</a></li>
							';
			}
			$__finalCompiled .= '
						';
		} else {
			$__finalCompiled .= '
							<li>' . 'Released' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('dbtech-ecommerce', $__vars['product'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['product']['creation_date'], array(
			))) . '</a></li>
						';
		}
		$__finalCompiled .= '
					</ul>
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

';
	return $__finalCompiled;
}
);