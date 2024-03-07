<?php
// FROM HASH: 6e7fa1eaf960729731a6fd8d39ef4072
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Permissions' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['record']['title']));
	$__finalCompiled .= '

' . $__templater->callMacro('dbtech_user_upgrade_permission_coupon_macros', 'list', array(
		'coupon' => $__vars['record'],
		'isPrivate' => $__vars['isPrivate'],
		'userGroups' => $__vars['userGroups'],
		'users' => $__vars['users'],
		'entries' => $__vars['entries'],
		'routeBase' => 'dbtech-upgrades/coupons/permissions',
	), $__vars);
	return $__finalCompiled;
}
);