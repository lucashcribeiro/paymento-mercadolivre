<?php
// FROM HASH: c51206b6a1a282a99036979cedd9d1f0
return array(
'macros' => array('datetimeinputrow' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'value' => '',
		'label' => '',
		'hint' => '',
		'required' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    ';
	$__compilerTemp1 = '';
	if ($__vars['value']) {
		$__compilerTemp1 .= '
                ' . $__templater->formDateInput(array(
			'name' => $__vars['name'] . '[date]',
			'value' => ($__vars['value']['date'] ? $__templater->func('date', array($__vars['value']['date'], 'Y-m-d', ), false) : ''),
		)) . '
                <span class="inputGroup-splitter"></span>
                ' . $__templater->formTextBox(array(
			'type' => 'time',
			'class' => 'input--date',
			'name' => $__vars['name'] . '[time]',
			'value' => ($__vars['value']['time'] ? $__vars['value']['time'] : ''),
			'required' => ($__vars['required'] ? 'required' : ''),
		)) . '
            ';
	} else {
		$__compilerTemp1 .= '
                ' . $__templater->formDateInput(array(
			'name' => $__vars['name'] . '[date]',
			'value' => '',
		)) . '
                <span class="inputGroup-splitter"></span>
                ' . $__templater->formTextBox(array(
			'type' => 'time',
			'class' => 'input--date',
			'name' => $__vars['name'] . '[time]',
			'value' => '',
			'required' => ($__vars['required'] ? 'required' : ''),
		)) . '
            ';
	}
	$__finalCompiled .= $__templater->formRow('
        <div class="inputGroup">
            ' . $__compilerTemp1 . '
        </div>
    ', array(
		'label' => $__templater->escape($__vars['label']),
		'rowtype' => 'input',
		'hint' => $__templater->escape($__vars['hint']),
	)) . '
';
	return $__finalCompiled;
}
),
'durationinputrow' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'value' => '',
		'label' => '',
		'hint' => '',
		'required' => '',
		'withdays' => false,
		'withhours' => true,
		'withminutes' => true,
		'withseconds' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

    ';
	if ($__vars['withdays']) {
		$__finalCompiled .= '
        ' . $__templater->formRow('
            ' . $__templater->formNumberBox(array(
			'name' => $__vars['name'] . '[days]',
			'value' => ($__vars['value'] ? $__vars['value']['days'] : ''),
			'min' => '0',
			'required' => ($__vars['required'] ? 'required' : ''),
		)) . '
        ', array(
			'label' => 'Days',
			'rowtype' => 'input',
			'hint' => $__templater->escape($__vars['hint']),
		)) . '
    ';
	}
	$__finalCompiled .= '

    ';
	if ($__vars['withhours']) {
		$__finalCompiled .= '
        ' . $__templater->formRow('
            ' . $__templater->formNumberBox(array(
			'name' => $__vars['name'] . '[hours]',
			'value' => ($__vars['value'] ? $__vars['value']['hours'] : ''),
			'min' => '0',
			'max' => '23',
			'required' => ($__vars['required'] ? 'required' : ''),
		)) . '
        ', array(
			'label' => 'Hours',
			'rowtype' => 'input',
			'hint' => $__templater->escape($__vars['hint']),
		)) . '
    ';
	}
	$__finalCompiled .= '

    ';
	if ($__vars['withminutes']) {
		$__finalCompiled .= '
        ' . $__templater->formRow('
            ' . $__templater->formNumberBox(array(
			'name' => $__vars['name'] . '[minutes]',
			'value' => ($__vars['value'] ? $__vars['value']['minutes'] : ''),
			'min' => '0',
			'max' => '59',
			'required' => ($__vars['required'] ? 'required' : ''),
		)) . '
        ', array(
			'label' => 'Minutes',
			'rowtype' => 'input',
			'hint' => $__templater->escape($__vars['hint']),
		)) . '
    ';
	}
	$__finalCompiled .= '

    ';
	if ($__vars['withseconds']) {
		$__finalCompiled .= '
        ' . $__templater->formRow('
            ' . $__templater->formNumberBox(array(
			'name' => $__vars['name'] . '[seconds]',
			'value' => ($__vars['value'] ? $__vars['value']['seconds'] : ''),
			'min' => '0',
			'max' => '59',
			'required' => ($__vars['required'] ? 'required' : ''),
		)) . '
        ', array(
			'label' => 'Seconds',
			'rowtype' => 'input',
			'hint' => $__templater->escape($__vars['hint']),
		)) . '
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
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);