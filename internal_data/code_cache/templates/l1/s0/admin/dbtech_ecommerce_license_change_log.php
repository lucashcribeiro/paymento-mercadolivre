<?php
// FROM HASH: 6c2e888a1b4ff0dc724e9ed11ff59716
return array(
'macros' => array('change_log_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'changesGrouped' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['changesGrouped'])) {
		foreach ($__vars['changesGrouped'] AS $__vars['group']) {
			$__compilerTemp1 .= '
		<tbody class="dataList-rowGroup">
			';
			$__compilerTemp2 = '';
			if ($__vars['group']['editUser']) {
				$__compilerTemp2 .= '
							<li>' . 'Edited by ' . $__templater->escape($__vars['group']['editUser']['username']) . '' . '</li>
						';
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
				'rowtype' => 'subsection',
				'rowclass' => 'dataList-row--noHover',
			), array(array(
				'href' => $__templater->func('link', array('dbtech-ecommerce/licenses/edit', $__vars['group']['content'], ), false),
				'colspan' => '3',
				'_type' => 'cell',
				'html' => '
					<span class="u-pullRight">' . $__templater->func('date_dynamic', array($__vars['group']['date'], array(
			))) . '</span>
					<ul class="listInline listInline--bullet">
						<li>' . $__templater->escape($__vars['group']['content']['title']) . '</li>
						' . $__compilerTemp2 . '
					</ul>
				',
			))) . '
			';
			if ($__templater->isTraversable($__vars['group']['changes'])) {
				foreach ($__vars['group']['changes'] AS $__vars['change']) {
					$__compilerTemp1 .= '
				' . $__templater->dataRow(array(
					), array(array(
						'_type' => 'cell',
						'html' => $__templater->escape($__vars['change']['label']),
					),
					array(
						'_type' => 'cell',
						'html' => $__templater->escape($__vars['change']['old']),
					),
					array(
						'_type' => 'cell',
						'html' => $__templater->escape($__vars['change']['new']),
					))) . '
			';
				}
			}
			$__compilerTemp1 .= '
		</tbody>
	';
		}
	}
	$__finalCompiled .= $__templater->dataList('
	<thead>
		' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => 'Field name',
	),
	array(
		'_type' => 'cell',
		'html' => 'Old value',
	),
	array(
		'_type' => 'cell',
		'html' => 'New value',
	))) . '
	</thead>
	' . $__compilerTemp1 . '
	', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('License change logs' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['license']['title']));
	$__finalCompiled .= '

';
	if ($__vars['changesGrouped']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				' . $__templater->callMacro(null, 'change_log_list', array(
			'changesGrouped' => $__vars['changesGrouped'],
		), $__vars) . '
			</div>
		</div>
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'dbtech-ecommerce/licenses/change-log',
			'data' => $__vars['license'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'No changes have been logged.' . '</div>
';
	}
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);