<?php
// FROM HASH: 281f91ab7f25fde8d98b14a6235bc308
return array(
'macros' => array('popup_item' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'expire' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<li class="menu-row menu-row--separated menu-row--clickable ">
		<div class="fauxBlockLink">
			<div class="contentRow">
				<div class="contentRow-main contentRow-main--close">
					' . 'Your <b><a href="' . $__templater->func('link', array('account/upgrades', ), true) . '" class="fauxBlockLink-blockLink">' . $__templater->escape($__vars['expire']['Upgrade']['title']) . '</a></b> subscription has expired
' . '
					<div class="contentRow-minor contentRow-minor--smaller contentRow-minor--hideLinks">
						';
	$__vars['time'] = $__templater->preEscaped((($__vars['expire']['Upgrade']['length_amount'] == 0) ? 'Permanent' : $__templater->escape($__vars['expire']['Upgrade']['length_amount'])));
	$__finalCompiled .= '
						' . 'Cost: ' . $__templater->filter($__vars['expire']['Upgrade']['cost_amount'], array(array('currency', array($__vars['expire']['Upgrade']['cost_currency'], )),), true) . '
<div class="contentRow-minor contentRow-minor--smaller">
	Duration: ' . $__templater->escape($__vars['time']) . ' ' . $__templater->escape($__vars['expire']['Upgrade']['length_unit']) . '
</div>' . '
					</div>
				</div>
			</div>
		</div>
	</li>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['expiring'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="menu-scroller">
		<ol class="listPlain">
			';
		if ($__templater->isTraversable($__vars['expiring'])) {
			foreach ($__vars['expiring'] AS $__vars['expire']) {
				$__finalCompiled .= '
				' . $__templater->callMacro(null, 'popup_item', array(
					'expire' => $__vars['expire'],
				), $__vars) . '
			';
			}
		}
		$__finalCompiled .= '
		</ol>
	</div>
';
	}
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);