<?php
// FROM HASH: e2b5d9d5a031487e3eac5d69f2af2212
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Your subscription ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['upgradeUrl'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['upgradeTitle'])) . '</a>') . ' has expired.';
	return $__finalCompiled;
}
);