<?php
// FROM HASH: 1042503029bced51f287fb37854d07fd
return array(
'macros' => array('popup_item' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'active' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<li class="menu-row menu-row--separated menu-row--clickable ">
		<div class="fauxBlockLink">
			<div class="contentRow">
				<div class="contentRow-main contentRow-main--close">
					' . 'Your subscription <b><a href="' . $__templater->func('link', array('account/upgrades', ), true) . '" class="fauxBlockLink-blockLink">' . $__templater->escape($__vars['active']['Upgrade']['title']) . '</a></b>
' . '
					<div class="contentRow-minor contentRow-minor--smaller contentRow-minor--hideLinks">
						';
	$__vars['time'] = $__templater->preEscaped((($__vars['active']['Upgrade']['length_amount'] == 0) ? 'Permanent' : $__templater->escape($__vars['active']['Upgrade']['length_amount'])));
	$__finalCompiled .= '
						' . 'Cost: ' . $__templater->filter($__vars['active']['Upgrade']['cost_amount'], array(array('currency', array($__vars['active']['Upgrade']['cost_currency'], )),), true) . '
<div class="contentRow-minor contentRow-minor--smaller">
	Duration: ' . $__templater->escape($__vars['time']) . ' ' . $__templater->escape($__vars['active']['Upgrade']['length_unit']) . '
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
	if (!$__templater->test($__vars['activate'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="menu-scroller">
		<ol class="listPlain">
			';
		if ($__templater->isTraversable($__vars['activate'])) {
			foreach ($__vars['activate'] AS $__vars['active']) {
				$__finalCompiled .= '
				' . $__templater->callMacro(null, 'popup_item', array(
					'active' => $__vars['active'],
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