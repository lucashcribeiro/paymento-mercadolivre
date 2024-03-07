<?php
// FROM HASH: d972682fc389b971a49fc109929cef89
return array(
'macros' => array('xfa_color_picker' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'value' => '',
		'mapName' => '',
		'allowPalette' => 'false',
		'label' => '',
		'hint' => '',
		'explain' => '',
		'html' => '',
		'row' => true,
		'rowClass' => '',
		'rowtype' => '',
		'colorData' => '',
		'required' => false,
		'includeScripts' => true,
		'callback' => '',
		'callbackParam' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

    ';
	$__templater->includeCss('public:color_picker.less');
	$__finalCompiled .= '
    ';
	$__templater->includeJs(array(
		'src' => 'xf/color_picker.js',
		'min' => '1',
	));
	$__finalCompiled .= '
    ';
	$__templater->includeJs(array(
		'src' => 'xfa/core/color_picker_with_callback.js',
		'min' => '1',
	));
	$__finalCompiled .= '

    ';
	$__vars['picker'] = $__templater->preEscaped('
        <div class="inputGroup inputGroup--joined inputGroup--color"
             data-xf-init="xfa-color-picker"
             data-allow-palette="' . $__templater->escape($__vars['allowPalette']) . '"
             data-map-name="' . $__templater->escape($__vars['mapName']) . '"
             data-callback="' . $__templater->escape($__vars['callback']) . '"
             data-callback-param="' . $__templater->escape($__vars['callbackParam']) . '">

            ' . $__templater->formTextBox(array(
		'name' => $__vars['name'],
		'value' => $__vars['value'],
		'required' => $__vars['required'],
	)) . '
            <div class="inputGroup-text"><span class="colorPickerBox js-colorPickerTrigger"></span></div>
        </div>
    ');
	$__finalCompiled .= '

    ';
	if ($__vars['row']) {
		$__finalCompiled .= '
        ' . $__templater->formRow('

            ' . $__templater->filter($__vars['picker'], array(array('raw', array()),), true) . '
        ', array(
			'rowtype' => $__vars['rowtype'],
			'rowclass' => 'formRow--input ' . $__vars['rowClass'],
			'label' => $__templater->escape($__vars['label']),
			'hint' => $__templater->escape($__vars['hint']),
			'explain' => $__templater->escape($__vars['explain']),
			'html' => $__templater->escape($__vars['html']),
		)) . '
        ';
	} else {
		$__finalCompiled .= '
        ' . $__templater->filter($__vars['picker'], array(array('raw', array()),), true) . '
    ';
	}
	$__finalCompiled .= '

    ';
	if ($__vars['includeScripts']) {
		$__finalCompiled .= '
        ' . $__templater->callMacro(null, 'xfa_color_picker_scripts', array(
			'colorData' => $__vars['colorData'],
		), $__vars) . '
    ';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'xfa_color_picker_scripts' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'colorData' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

    ' . $__templater->callMacro('public:color_picker_macros', 'color_picker_scripts', array(
		'colorData' => $__vars['colorData'],
	), $__vars) . '

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