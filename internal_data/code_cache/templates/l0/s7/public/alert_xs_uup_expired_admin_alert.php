<?php
// FROM HASH: 122a32547297a3931c13f4cc385b6a96
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'The user: ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['user'])) . '</a>') . ' has  his subscription (' . $__templater->escape($__vars['extra']['title']) . ') which has expired';
	return $__finalCompiled;
}
);