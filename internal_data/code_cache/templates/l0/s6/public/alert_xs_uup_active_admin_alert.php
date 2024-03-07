<?php
// FROM HASH: b04dcca108ee5e469899ff7243894b81
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'The user: ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['user'])) . '</a>') . ' has  his subscription (' . $__templater->escape($__vars['extra']['title']) . ') which is about to expire';
	return $__finalCompiled;
}
);