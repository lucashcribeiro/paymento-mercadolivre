<?php
// FROM HASH: f70e123938c433d022f2ffea06242137
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['XsUupButton'] = $__templater->func('property', array('xs_uup_button_in_nav_bar_active', ), false);
	$__finalCompiled .= '

';
	if ($__templater->arrayKey($__templater->method($__vars['xf']['visitor'], 'canViewXsActiveExpiredUserUpgrade', array()), 'expired') AND $__vars['XsUupButton']['expired']) {
		$__finalCompiled .= '
	<a href="' . $__templater->func('link', array('account/upgrades', ), true) . '"
	   class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--xs-uup-expired-upgrade js-badge--xs-uup-expired-upgrade badgeContainer"
	   data-xf-click="menu"
	   data-menu-pos-ref="< .p-navgroup"
	   aria-label="' . $__templater->filter('Expired subscriptions', array(array('for_attr', array()),), true) . '"
	   aria-expanded="false"
	   aria-haspopup="true">
		<i aria-hidden="true"></i>
		<span class="p-navgroup-linkText">' . '' . '</span>
	</a>
	<div class="menu menu--structural menu--medium" data-menu="menu" aria-hidden="true"
		 data-href="' . $__templater->func('link', array('renew-sub/expired-popup', ), true) . '"
		 data-nocache="true"
		 data-load-target=".js-UpgradeMenuBody">
		<div class="menu-content">
			<h3 class="menu-header">' . 'Expired subscriptions' . '</h3>
			<div class="js-UpgradeMenuBody">
				<div class="menu-row">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
			</div>
			<div class="menu-footer menu-footer--split">
				<span class="menu-footer-main">
					<a href="' . $__templater->func('link', array('account/upgrades', ), true) . '">' . 'Show all' . $__vars['xf']['language']['ellipsis'] . '</a>
				</span>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '
';
	if ($__templater->arrayKey($__templater->method($__vars['xf']['visitor'], 'canViewXsActiveExpiredUserUpgrade', array()), 'active') AND $__vars['XsUupButton']['active']) {
		$__finalCompiled .= '
	<a href="' . $__templater->func('link', array('account/upgrades', ), true) . '"
	   class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--xs-uup-active-upgrade js-badge--xs-uup-active-upgrade badgeContainer"
	   data-xf-click="menu"
	   data-menu-pos-ref="< .p-navgroup"
	   aria-label="' . $__templater->filter('Active subscriptions', array(array('for_attr', array()),), true) . '"
	   aria-expanded="false"
	   aria-haspopup="true">
		<i aria-hidden="true"></i>
		<span class="p-navgroup-linkText">' . '' . '</span>
	</a>
	<div class="menu menu--structural menu--medium" data-menu="menu" aria-hidden="true"
		 data-href="' . $__templater->func('link', array('renew-sub/active-popup', ), true) . '"
		 data-nocache="true"
		 data-load-target=".js-UpgradeMenuBody">
		<div class="menu-content">
			<h3 class="menu-header">' . 'Active subscriptions' . '</h3>
			<div class="js-UpgradeMenuBody">
				<div class="menu-row">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
			</div>
			<div class="menu-footer menu-footer--split">
				<span class="menu-footer-main">
					<a href="' . $__templater->func('link', array('account/upgrades', ), true) . '">' . 'Show all' . $__vars['xf']['language']['ellipsis'] . '</a>
				</span>
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);