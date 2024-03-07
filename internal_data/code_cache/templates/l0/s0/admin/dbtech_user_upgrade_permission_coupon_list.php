<?php
// FROM HASH: dfe26667932338e2d15c509a2ae909ed
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['record']['title']));
	$__finalCompiled .= '

' . $__templater->callMacro('dbtech_user_upgrade_permission_coupon_macros', 'list', array(
		'coupon' => $__vars['record'],
		'isPrivate' => $__vars['isPrivate'],
		'userGroups' => $__vars['userGroups'],
		'users' => $__vars['users'],
		'entries' => $__vars['entries'],
		'routeBase' => 'permissions/dbtech-upgrade-coupons',
	), $__vars);
	return $__finalCompiled;
}
);