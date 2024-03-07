<?php
// FROM HASH: 40f2d9d22fd33571d7e607235fbf7c24
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Your subscription ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['upgradeUrl'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['upgradeTitle'])) . '</a>') . ' expires in ' . $__templater->escape($__vars['extra']['days']) . ' days.';
	return $__finalCompiled;
}
);