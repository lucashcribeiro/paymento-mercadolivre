<?php
// FROM HASH: 82c60df684fd76d062492a642de13de4
return array(
'macros' => array('uix_tabBar' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
		<div class="uix_tabBar">
			<div class="uix_tabList">
				<a href="' . $__templater->func('link', array('account', ), true) . '" class="uix_tabItem">
					' . $__templater->fontAwesome('fa-user', array(
		)) . '
					<div class="uix_tabLabel">' . 'Account' . '</div>
				</a>
				<a href="' . $__templater->func('link', array('whats-new', ), true) . '" class="uix_tabItem">
					' . $__templater->fontAwesome('fa-comment-alt-exclamation', array(
		)) . '
					<div class="uix_tabLabel">' . 'What\'s new' . '</div>
				</a>
				<a href="' . $__templater->func('link', array('conversations', ), true) . '" data-xf-click="overlay" data-badge="' . $__templater->filter($__vars['xf']['visitor']['conversations_unread'], array(array('number', array()),), true) . '" class="uix_tabItem js-badge--conversations badgeContainer' . ($__vars['xf']['visitor']['conversations_unread'] ? ' badgeContainer--highlighted' : '') . '">
					' . $__templater->fontAwesome('fa-inbox', array(
		)) . '
					<div class="uix_tabLabel">' . 'Inbox' . '</div>
				</a>
				<a href="' . $__templater->func('link', array('account/alerts', ), true) . '" data-xf-click="overlay" data-badge="' . $__templater->filter($__vars['xf']['visitor']['alerts_unread'], array(array('number', array()),), true) . '" class="uix_tabItem js-badge--alerts badgeContainer' . ($__vars['xf']['visitor']['alerts_unread'] ? ' badgeContainer--highlighted' : '') . '">
					' . $__templater->fontAwesome('fa-bell', array(
		)) . '
					<div class="uix_tabLabel">' . 'Alerts' . '</div>
				</a>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);