<?php

return function($__templater, $__selectedNav, array $__vars)
{
	$__tree = [];
	$__flat = [];


	$__navTemp = [
		'title' => \XF::phrase('nav._default'),
		'href' => '',
		'attributes' => [],
	];
	if ($__navTemp) {
		$__tree['_default'] = $__navTemp;
		$__flat['_default'] =& $__tree['_default'];
		if (empty($__tree['_default']['children'])) { $__tree['_default']['children'] = []; }

		if ($__vars['xf']['visitor']['user_id']) {
			$__navTemp = [
		'title' => \XF::phrase('nav.defaultNewsFeed'),
		'href' => $__templater->func('link', array('whats-new/news-feed', ), false),
		'attributes' => [],
	];
			if ($__navTemp) {
				$__tree['_default']['children']['defaultNewsFeed'] = $__navTemp;
				$__flat['defaultNewsFeed'] =& $__tree['_default']['children']['defaultNewsFeed'];
			}
		}

		$__navTemp = [
		'title' => \XF::phrase('nav.defaultLatestActivity'),
		'href' => $__templater->func('link', array('whats-new/latest-activity', ), false),
		'attributes' => [],
	];
		if ($__navTemp) {
			$__tree['_default']['children']['defaultLatestActivity'] = $__navTemp;
			$__flat['defaultLatestActivity'] =& $__tree['_default']['children']['defaultLatestActivity'];
		}

		if ($__vars['xf']['visitor']['user_id']) {
			$__navTemp = [
		'title' => \XF::phrase('nav.defaultYourProfile'),
		'href' => $__templater->func('link', array('members', $__vars['xf']['visitor'], ), false),
		'attributes' => [],
	];
			if ($__navTemp) {
				$__tree['_default']['children']['defaultYourProfile'] = $__navTemp;
				$__flat['defaultYourProfile'] =& $__tree['_default']['children']['defaultYourProfile'];
			}
		}

		if ($__vars['xf']['visitor']['user_id']) {
			$__navTemp = [
		'title' => \XF::phrase('nav.defaultYourAccount'),
		'href' => $__templater->func('link', array('account', ), false),
		'attributes' => [],
	];
			if ($__navTemp) {
				$__tree['_default']['children']['defaultYourAccount'] = $__navTemp;
				$__flat['defaultYourAccount'] =& $__tree['_default']['children']['defaultYourAccount'];
			}
		}

		if ($__vars['xf']['visitor']['user_id']) {
			$__navTemp = [
		'title' => \XF::phrase('nav.defaultLogOut'),
		'href' => $__templater->func('link', array('logout', null, array('t' => $__templater->func('csrf_token', array(), false), ), ), false),
		'attributes' => [],
	];
			if ($__navTemp) {
				$__tree['_default']['children']['defaultLogOut'] = $__navTemp;
				$__flat['defaultLogOut'] =& $__tree['_default']['children']['defaultLogOut'];
			}
		}

		if (((!$__vars['xf']['visitor']['user_id']) AND $__vars['xf']['options']['registrationSetup']['enabled'])) {
			$__navTemp = [
		'title' => \XF::phrase('nav.defaultRegister'),
		'href' => $__templater->func('link', array('register', ), false),
		'attributes' => [],
	];
			if ($__navTemp) {
				$__tree['_default']['children']['defaultRegister'] = $__navTemp;
				$__flat['defaultRegister'] =& $__tree['_default']['children']['defaultRegister'];
			}
		}

	}

	if ($__vars['xf']['homePageUrl']) {
		$__navTemp = [
		'title' => \XF::phrase('nav.home'),
		'href' => $__vars['xf']['homePageUrl'],
		'attributes' => [],
	];
		if ($__navTemp) {
			$__tree['home'] = $__navTemp;
			$__flat['home'] =& $__tree['home'];
		}
	}

	$__navTemp = [
		'title' => \XF::phrase('nav.forums'),
		'href' => $__templater->func('link', array('forums', ), false),
		'attributes' => [],
	];
	if ($__navTemp) {
		$__tree['forums'] = $__navTemp;
		$__flat['forums'] =& $__tree['forums'];
	}

	if ($__templater->method($__vars['xf']['visitor'], 'canViewMemberList', array())) {
		$__navTemp = [
		'title' => \XF::phrase('nav.members'),
		'href' => $__templater->func('link', array('members', ), false),
		'attributes' => [],
	];
		if ($__navTemp) {
			$__tree['members'] = $__navTemp;
			$__flat['members'] =& $__tree['members'];
			if (empty($__tree['members']['children'])) { $__tree['members']['children'] = []; }

			if ($__vars['xf']['options']['enableMemberList']) {
				$__navTemp = [
		'title' => \XF::phrase('nav.registeredMembers'),
		'href' => $__templater->func('link', array('members/list', ), false),
		'attributes' => [],
	];
				if ($__navTemp) {
					$__tree['members']['children']['registeredMembers'] = $__navTemp;
					$__flat['registeredMembers'] =& $__tree['members']['children']['registeredMembers'];
				}
			}

			$__navTemp = [
		'title' => \XF::phrase('nav.currentVisitors'),
		'href' => $__templater->func('link', array('online', ), false),
		'attributes' => [],
	];
			if ($__navTemp) {
				$__tree['members']['children']['currentVisitors'] = $__navTemp;
				$__flat['currentVisitors'] =& $__tree['members']['children']['currentVisitors'];
			}

			if ($__templater->method($__vars['xf']['visitor'], 'canViewProfilePosts', array())) {
				$__navTemp = [
		'title' => \XF::phrase('nav.newProfilePosts'),
		'href' => $__templater->func('link', array('whats-new/profile-posts', ), false),
		'attributes' => [
			'rel' => 'nofollow',
		],
	];
				if ($__navTemp) {
					$__tree['members']['children']['newProfilePosts'] = $__navTemp;
					$__flat['newProfilePosts'] =& $__tree['members']['children']['newProfilePosts'];
				}
			}

			if (($__templater->method($__vars['xf']['visitor'], 'canSearch', array()) AND $__templater->method($__vars['xf']['visitor'], 'canViewProfilePosts', array()))) {
				$__navTemp = [
		'title' => \XF::phrase('nav.searchProfilePosts'),
		'href' => $__templater->func('link', array('search', null, array('type' => 'profile_post', ), ), false),
		'attributes' => [],
	];
				if ($__navTemp) {
					$__tree['members']['children']['searchProfilePosts'] = $__navTemp;
					$__flat['searchProfilePosts'] =& $__tree['members']['children']['searchProfilePosts'];
				}
			}

		}
	}

	if (($__templater->method($__vars['xf']['visitor'], 'hasOption', array('hasDbEcommerce', )) AND $__templater->method($__vars['xf']['visitor'], 'canViewDbtechEcommerceProducts', array()))) {
		$__navTemp = [
		'title' => \XF::phrase('nav.dbtechEcommerce'),
		'href' => $__templater->func('link', array('dbtech-ecommerce', ), false),
		'attributes' => [],
	];
		if ($__navTemp) {
			$__tree['dbtechEcommerce'] = $__navTemp;
			$__flat['dbtechEcommerce'] =& $__tree['dbtechEcommerce'];
		}
	}

	if (($__templater->method($__vars['xf']['visitor'], 'isMemberOf', array(6, )) OR $__templater->method($__vars['xf']['visitor'], 'isMemberOf', array(5, )))) {
		$__navTemp = [
		'title' => \XF::phrase('nav.download_id'),
		'href' => '',
		'attributes' => [],
	];
		if ($__navTemp) {
			$__tree['download_id'] = $__navTemp;
			$__flat['download_id'] =& $__tree['download_id'];
		}
	}



	return [
		'tree' => $__tree,
		'flat' => $__flat
	];
};