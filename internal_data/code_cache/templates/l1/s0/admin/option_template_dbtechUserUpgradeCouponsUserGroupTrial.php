<?php
// FROM HASH: c900e22a8a304f795144a754c35efc18
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['userGroupRepo'] = $__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:UserGroup', ));
	$__vars['userGroups'] = $__templater->method($__vars['userGroupRepo'], 'getUserGroupTitlePairs', array());
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__finalCompiled .= $__templater->formRow('

	' . $__templater->formCheckBox(array(
		'name' => $__vars['inputName'] . '[enabled]',
		'value' => $__vars['option']['option_value']['enabled'],
	), array(array(
		'value' => '1',
		'label' => $__templater->escape($__vars['option']['title']),
		'_dependent' => array('
				<div class="u-inputSpacer">
					<div class="inputGroup">
						' . $__templater->formNumberBox(array(
		'name' => $__vars['inputName'] . '[trial_length_amount]',
		'value' => $__vars['option']['option_value']['trial_length_amount'],
		'min' => '1',
		'max' => '255',
	)) . '
						<span class="inputGroup-splitter"></span>
						' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[trial_length_unit]',
		'value' => $__vars['option']['option_value']['trial_length_unit'],
		'class' => 'input--inline',
	), array(array(
		'value' => 'day',
		'label' => 'Days',
		'_type' => 'option',
	),
	array(
		'value' => 'month',
		'label' => 'Months',
		'_type' => 'option',
	),
	array(
		'value' => 'year',
		'label' => 'Years',
		'_type' => 'option',
	))) . '
					</div>
				</div>
			', '
				<div class="u-inputSpacer">
					<div class="inputGroup">
						<span class="inputGroup-text">' . 'for user group' . $__vars['xf']['language']['ellipsis'] . '</span>
					</div>
				</div>
				<div class="u-inputSpacer">
					<div class="inputGroup">
						' . '' . '
						' . '' . '
						
						' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[user_group_id]',
		'value' => $__vars['option']['option_value']['user_group_id'],
	), $__compilerTemp1) . '
					</div>
				</div>
			'),
		'_type' => 'option',
	))) . '
	<div class="formRow-explain">' . $__templater->escape($__vars['explainHtml']) . '</div>
', array(
		'hint' => $__templater->escape($__vars['hintHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
	));
	return $__finalCompiled;
}
);