<?php
// FROM HASH: c3fd4bd71de663a0e014f95307f92478
return array(
'macros' => array('xfa_fa_picker' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'value' => '',
		'additionalInputUpdate' => '',
		'callback' => '',
		'callbackParam' => '',
		'label' => '',
		'hint' => '',
		'explain' => '',
		'html' => '',
		'row' => true,
		'rowClass' => '',
		'rowtype' => '',
		'includeScripts' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['xf']['options']['currentVersionId'] < 2001270) {
		$__finalCompiled .= '
		';
		$__templater->includeJs(array(
			'src' => 'xfa/vendor/jquery-migrate/3.0.0/jquery-migrate.js',
			'min' => '1',
		));
		$__finalCompiled .= '
		';
		$__templater->includeJs(array(
			'src' => 'xfa/vendor/fontawesome-iconpicker/1.2.2/fontawesome-iconpicker.js',
			'min' => '1',
		));
		$__finalCompiled .= '
		';
		$__templater->includeCss('public:xfa_fontawesome_iconpicker_1.2.2.css');
		$__finalCompiled .= '
	';
	} else if ($__vars['xf']['options']['currentVersionId'] < 2020270) {
		$__finalCompiled .= '
		';
		$__templater->includeJs(array(
			'src' => 'xfa/vendor/fontawesome-iconpicker/3.2.0/fontawesome-iconpicker.js',
			'min' => '1',
		));
		$__finalCompiled .= '
		';
		$__templater->includeCss('public:xfa_fontawesome_iconpicker_3.2.0.css');
		$__finalCompiled .= '
	';
	} else {
		$__finalCompiled .= '
		';
		$__templater->includeJs(array(
			'src' => 'xfa/vendor/fontawesome-iconpicker/fa_5.10.1/fontawesome-iconpicker.js',
			'min' => '1',
		));
		$__finalCompiled .= '
		';
		$__templater->includeCss('public:xfa_fontawesome_iconpicker_fa_5.10.1.css');
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
	
    ';
	$__templater->includeJs(array(
		'src' => 'xfa/core/fa_picker.js',
		'min' => '1',
	));
	$__finalCompiled .= '
    ';
	$__templater->includeCss('public:xfa_fa_picker.less');
	$__finalCompiled .= '

    ';
	$__vars['picker'] = $__templater->preEscaped('
        <div class="inputGroup inputGroup--joined inputGroup--fa">
            <input type="text" name="' . $__templater->escape($__vars['name']) . '" class="input icp" value="' . $__templater->escape($__vars['value']) . '" data-additional-input-update="' . $__templater->escape($__vars['additionalInputUpdate']) . '" data-callback="' . $__templater->escape($__vars['callback']) . '" data-callback-param="' . $__templater->escape($__vars['callbackParam']) . '" data-xf-init="xfa-fa-picker" />
            <div class="inputGroup-text"><span class="xfaFaPickerBox js-xfaFaPickerTrigger"></span></div>
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
        ' . $__templater->callMacro(null, 'xfa_fa_picker_scripts', array(), $__vars) . '
    ';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'xfa_fa_picker_scripts' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

    ';
	$__templater->setPageParam('head.' . 'js-xfaFaPicker', $__templater->preEscaped('

        <script class="js-extraPhrases" type="application/json">
            {
                "xfa_core_type_to_filter": "' . $__templater->filter('Type to filter', array(array('escape', array('js', )),), true) . '"
            }
        </script>

    '));
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