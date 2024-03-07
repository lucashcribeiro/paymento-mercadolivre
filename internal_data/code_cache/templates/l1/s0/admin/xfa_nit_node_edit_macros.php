<?php
// FROM HASH: ba58ebdbfa68a85df3c6f100fc6e9725
return array(
'macros' => array('xfa_nit' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'serverIconsData' => '',
		'showSecondIcon' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    ';
	$__templater->includeJs(array(
		'src' => 'xfa/nodesicontweak/NodesIconTweak.min.js',
	));
	$__finalCompiled .= '
    ';
	$__templater->includeCss('xfa_nit_node_edit.less');
	$__finalCompiled .= '

    <hr class="formRowSep" />

    ';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => 'Use default XenForo Nodes icons
',
		'_type' => 'option',
	)
,array(
		'value' => '1',
		'label' => 'Use Font Awesome Nodes icons
',
		'_dependent' => array($__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_fa', array(
		'node' => $__vars['node'],
		'showSecondIcon' => $__vars['showSecondIcon'],
	), $__vars)),
		'_type' => 'option',
	));
	if ($__vars['serverIconsData']['icons']) {
		$__compilerTemp1[] = array(
			'value' => '2',
			'label' => 'Use icons from server
',
			'hint' => 'Server icons are loaded from the data (or another name if you renamed it) folder of your xF installation. <br /> Icons shall be located in the xfa/nodesicontweak/icons subdirectory.
',
			'_dependent' => array($__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_server', array(
			'node' => $__vars['node'],
			'serverIconsData' => $__vars['serverIconsData'],
			'showSecondIcon' => $__vars['showSecondIcon'],
		), $__vars)),
			'_type' => 'option',
		);
	} else {
		$__compilerTemp1[] = array(
			'value' => '2',
			'disabled' => 'disabled',
			'label' => 'No icons found on server
',
			'hint' => 'Server icons are loaded from the data (or another name if you renamed it) folder of your xF installation. <br /> Icons shall be located in the xfa/nodesicontweak/icons subdirectory.
',
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => '3',
		'label' => 'Use Sprite Image URL (Don\'t use for sub-forums level n > 2)
',
		'_dependent' => array($__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_sprite', array(
		'node' => $__vars['node'],
		'showSecondIcon' => $__vars['showSecondIcon'],
	), $__vars)),
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => '5',
		'label' => 'Use latest poster avatar
',
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => 'xfa_nit_type',
		'value' => $__vars['node']['xfa_nit_type'],
	), $__compilerTemp1, array(
		'label' => 'Nodes Icon Tweak
',
		'rowclass' => 'xfa_nit',
		'html' => '<div class="formRow-explain">' . 'Ensure when setting icon size, that the set size correspond to your nodeIcon css style width (xF default is 36px). <br />
For "Category" and "Forum", if you don\'t enter an "Unread" icon, then the "Read" will be displayed wether are or not new messages.
' . '</div>',
	)) . '
';
	return $__finalCompiled;
}
),
'xfa_nit_fa' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'showSecondIcon' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    <div class="xfaNitFa hiddenDiv">
        ';
	if ($__vars['showSecondIcon']) {
		$__finalCompiled .= '
            <div class="block tabbedBlock">
                <div class="block-container">
                    <h2 class="block-tabHeader tabs" data-xf-init="tabs" role="tablist">
                        <span class="hScroller-scroll">
                            <a href="#"
                               class="tabs-tab is-active" role="tab" aria-controls="read">' . 'Read Icon
' . '</a>
                            <a href="#"
                               class="tabs-tab" role="tab" aria-controls="unread">' . 'Unread Icon
' . '</a>
                        </span>
                    </h2>
                    <ul class="tabPanes">
                        <li class="is-active" role="tabpanel" id="read">
                            <div class="block-body">
                                ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_fa_icon', array(
			'node' => $__vars['node'],
			'name' => 'fa_icon1',
			'callback' => 'XFANodesIconTweak_updateFAIcon1Preview',
		), $__vars) . '
                            </div>
                        </li>
                        <li role="tabpanel" id="unread">
                            <div class="block-body">
                                ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_fa_icon', array(
			'node' => $__vars['node'],
			'name' => 'fa_icon2',
			'callback' => 'XFANodesIconTweak_updateFAIcon2Preview',
		), $__vars) . '
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        ';
	} else {
		$__finalCompiled .= '
            ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_fa_icon', array(
			'node' => $__vars['node'],
			'name' => 'fa_icon1',
			'callback' => 'XFANodesIconTweak_updateFAIcon1Preview',
		), $__vars) . '
        ';
	}
	$__finalCompiled .= '
    </div>
';
	return $__finalCompiled;
}
),
'xfa_nit_fa_icon' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'name' => '',
		'callback' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    <div class="' . $__templater->escape($__vars['name']) . '">
        <input type="hidden" name="' . $__templater->escape($__vars['name']) . '[layer_down]" id="' . $__templater->escape($__vars['name']) . '_layer_down" value="' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down']) . '" />
        <input type="hidden" name="' . $__templater->escape($__vars['name']) . '[layer_up]" id="' . $__templater->escape($__vars['name']) . '_layer_up" value="' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up']) . '" />

        <dl>
            <dt>' . 'Lower layer
' . ':</dt>
            <dd>
                ' . $__templater->callMacro('public:xfa_fa_picker_macros', 'xfa_fa_picker', array(
		'name' => $__vars['name'] . '_layer_down_list',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down'],
		'additionalInputUpdate' => 'input[name=' . '"' . $__vars['name'] . '[layer_down]' . '"' . ']',
		'callback' => $__vars['callback'],
		'row' => false,
	), $__vars) . '
            </dd>
        </dl>

        <dl>
            <dt>' . 'Lower layer color' . ':</dt>
            <dd>
                ' . $__templater->callMacro('public:xfa_color_picker_macros', 'xfa_color_picker', array(
		'name' => $__vars['name'] . '[layer_down_color]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_color'],
		'allowPalette' => false,
		'row' => '',
		'includeScripts' => true,
		'callback' => $__vars['callback'],
	), $__vars) . '
            </dd>
        </dl>

        <dl>
            <dt>' . 'Lower layer transform' . ':</dt>
            <dd>
                <select name="' . $__templater->escape($__vars['name']) . '[layer_down_transform]" id="' . $__templater->escape($__vars['name']) . '_layer_down_transform" class="input">
                    <option value="" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_transform'] == '') ? 'selected="selected"' : '') . '>' . 'No transformation
' . '</option>
                    <option value="fa-rotate-90" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_transform'] == 'fa-rotate-90') ? 'selected="selected"' : '') . '>' . 'Rotate 90&deg;
' . '</option>
                    <option value="fa-rotate-180" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_transform'] == 'fa-rotate-180') ? 'selected="selected"' : '') . '>' . 'Rotate 180&deg;
' . '</option>
                    <option value="fa-rotate-270" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_transform'] == 'fa-rotate-270') ? 'selected="selected"' : '') . '>' . 'Rotate 270&deg;
' . '</option>
                    <option value="fa-flip-horizontal" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_transform'] == 'fa-flip-horizontal') ? 'selected="selected"' : '') . '>' . 'Flip horizontally
' . '</option>
                    <option value="fa-flip-vertical" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_transform'] == 'fa-flip-vertical') ? 'selected="selected"' : '') . '>' . 'Flip vertically
' . '</option>
                </select>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Lower layer animate' . ':</dt>
            <dd>
                <select name="' . $__templater->escape($__vars['name']) . '[layer_down_animate]" id="' . $__templater->escape($__vars['name']) . '_layer_down_animate" class="input">
                    <option value="" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_animate'] == '') ? 'selected="selected"' : '') . '>' . 'No animation
' . '</option>
                    <option value="fa-spin" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_animate'] == 'fa-spin') ? 'selected="selected"' : '') . '>' . 'Spin
' . '</option>
                    <option value="fa-pulse" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_down_animate'] == 'fa-pulse') ? 'selected="selected"' : '') . '>' . 'Pulse
' . '</option>
                </select>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Upper layer
' . ':</dt>
            <dd>
                ' . $__templater->callMacro('public:xfa_fa_picker_macros', 'xfa_fa_picker', array(
		'name' => $__vars['name'] . '_layer_up_list',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up'],
		'additionalInputUpdate' => 'input[name=' . '"' . $__vars['name'] . '[layer_up]' . '"' . ']',
		'callback' => $__vars['callback'],
		'row' => false,
	), $__vars) . '
            </dd>
        </dl>

        <dl>
            <dt>' . 'Upper layer color' . ':</dt>
            <dd>
                ' . $__templater->callMacro('public:xfa_color_picker_macros', 'xfa_color_picker', array(
		'name' => $__vars['name'] . '[layer_up_color]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_color'],
		'allowPalette' => false,
		'row' => '',
		'includeScripts' => true,
		'callback' => $__vars['callback'],
	), $__vars) . '
            </dd>
        </dl>

        <dl>
            <dt>' . 'Upper layer transform' . ':</dt>
            <dd>
                <select name="' . $__templater->escape($__vars['name']) . '[layer_up_transform]" id="' . $__templater->escape($__vars['name']) . '_layer_up_transform" class="input">
                    <option value="" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_transform'] == '') ? 'selected="selected"' : '') . '>' . 'No transformation
' . '</option>
                    <option value="fa-rotate-90" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_transform'] == 'fa-rotate-90') ? 'selected="selected"' : '') . '>' . 'Rotate 90&deg;
' . '</option>
                    <option value="fa-rotate-180" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_transform'] == 'fa-rotate-180') ? 'selected="selected"' : '') . '>' . 'Rotate 180&deg;
' . '</option>
                    <option value="fa-rotate-270" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_transform'] == 'fa-rotate-270') ? 'selected="selected"' : '') . '>' . 'Rotate 270&deg;
' . '</option>
                    <option value="fa-flip-horizontal" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_transform'] == 'fa-flip-horizontal') ? 'selected="selected"' : '') . '>' . 'Flip horizontally
' . '</option>
                    <option value="fa-flip-vertical" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_transform'] == 'fa-flip-vertical') ? 'selected="selected"' : '') . '>' . 'Flip vertically
' . '</option>
                </select>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Upper layer animate' . ':</dt>
            <dd>
                <select name="' . $__templater->escape($__vars['name']) . '[layer_up_animate]" id="' . $__templater->escape($__vars['name']) . '_layer_up_animate" class="input">
                    <option value="" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_animate'] == '') ? 'selected="selected"' : '') . '>' . 'No animation
' . '</option>
                    <option value="fa-spin" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_animate'] == 'fa-spin') ? 'selected="selected"' : '') . '>' . 'Spin
' . '</option>
                    <option value="fa-pulse" ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['layer_up_animate'] == 'fa-pulse') ? 'selected="selected"' : '') . '>' . 'Pulse
' . '</option>
                </select>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Size
' . ' (px):</dt>
            <dd>
                ' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[size]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['size'],
		'min' => '0',
		'step' => '1',
	)) . '
                <div class="formRow-explain">' . 'If you use both up and down layer, set the size to half your expected size as the stacking multiply the down layer size by 2.
' . '</div>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Small Size
' . ' (px):</dt>
            <dd>
                ' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[small_size]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['small_size'],
		'min' => '0',
		'step' => '1',
	)) . '
                <div class="formRow-explain">' . 'This size corresponds to the icon displayed near the node title if displayed (ie. not in a popup, style property "Show sub-forums popup" disabled).<br /> If you use both up and down layer, set the size to half your expected size as the stacking multiply the down layer size by 2.
' . '</div>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Icon preview
' . ':</dt>
            <dd><div id="' . $__templater->escape($__vars['name']) . '_preview"></div></dd>
        </dl>
    </div>
';
	return $__finalCompiled;
}
),
'xfa_nit_server' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'serverIconsData' => '',
		'showSecondIcon' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    <div class="xfaNitSrv hiddenDiv">
        ';
	if ($__vars['showSecondIcon']) {
		$__finalCompiled .= '
            <div class="block tabbedBlock">
                <div class="block-container">
                    <h2 class="block-tabHeader tabs" data-xf-init="tabs" role="tablist">
                        <span class="hScroller-scroll">
                            <a href="#"
                               class="tabs-tab is-active" role="tab" aria-controls="read">' . 'Read Icon
' . '</a>
                            <a href="#"
                               class="tabs-tab" role="tab" aria-controls="unread">' . 'Unread Icon
' . '</a>
                        </span>
                    </h2>
                    <ul class="tabPanes">
                        <li class="is-active" role="tabpanel" id="read">
                            <div class="block-body">
                               ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_srv_icon', array(
			'node' => $__vars['node'],
			'name' => 'srv_icon1',
			'serverIconsData' => $__vars['serverIconsData'],
		), $__vars) . '
                            </div>
                        </li>
                        <li role="tabpanel" id="unread">
                            <div class="block-body">
                               ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_srv_icon', array(
			'node' => $__vars['node'],
			'name' => 'srv_icon2',
			'serverIconsData' => $__vars['serverIconsData'],
		), $__vars) . '
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            ';
	} else {
		$__finalCompiled .= '
            ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_srv_icon', array(
			'node' => $__vars['node'],
			'name' => 'srv_icon1',
			'serverIconsData' => $__vars['serverIconsData'],
		), $__vars) . '
        ';
	}
	$__finalCompiled .= '
    </div>
';
	return $__finalCompiled;
}
),
'xfa_nit_srv_icon' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'name' => '',
		'serverIconsData' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    <div class="' . $__templater->escape($__vars['name']) . '">
        <input type="hidden" name="' . $__templater->escape($__vars['name']) . '[icon]" id=' . $__templater->escape($__vars['name']) . '_icon" value="' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['icon']) . '" />
        <input type="hidden" name="' . $__templater->escape($__vars['name']) . '[small_icon]" id=' . $__templater->escape($__vars['name']) . '_small_icon" value="' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['small_icon']) . '" />

        <dl>
            <dt>' . 'Select server icon
' . ':</dt>
            <dd>
                <ul id="' . $__templater->escape($__vars['name']) . '_list_srv" class="xfa_nit_icon_list" data-baseurl="' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '">
                    ';
	if ($__templater->isTraversable($__vars['serverIconsData']['icons'])) {
		foreach ($__vars['serverIconsData']['icons'] AS $__vars['icon']) {
			$__finalCompiled .= '
                        <li data-value="' . $__templater->escape($__vars['icon']) . '" class="nitIcon ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['icon'] == $__vars['icon']) ? 'selected' : '') . '">
                            <img src="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '/' . $__templater->escape($__vars['icon']) . '" />
                        </li>
                    ';
		}
	}
	$__finalCompiled .= '
                </ul>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Size
' . ' (px):</dt>
            <dd>' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[size]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['size'],
		'min' => '0',
		'step' => '1',
	)) . '</dd>
        </dl>

        <dl>
            <dt>' . 'Icon preview
' . ':</dt>
            <dd>
                <div id="' . $__templater->escape($__vars['name']) . '_preview" data-preview-base-url="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '/">
                    ';
	if ($__vars['node']['xfa_nit_params'][$__vars['name']]['icon']) {
		$__finalCompiled .= '<img src="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['icon']) . '" />';
	}
	$__finalCompiled .= '
                </div>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Select small server icon
' . ':</dt>
            <dd>
                <ul id="' . $__templater->escape($__vars['name']) . '_small_list_srv" class="xfa_nit_icon_list" data-baseurl="' . $__templater->escape($__vars['serverIconsData']['small_icons_url']) . '">
                    ';
	if ($__vars['serverIconsData']['small_icons']) {
		$__finalCompiled .= '
                        ';
		if ($__templater->isTraversable($__vars['serverIconsData']['small_icons'])) {
			foreach ($__vars['serverIconsData']['small_icons'] AS $__vars['icon']) {
				$__finalCompiled .= '
                            <li data-value="' . $__templater->escape($__vars['icon']) . '" class="nitIcon ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['icon'] == $__vars['icon']) ? 'selected' : '') . '">
                                <img src="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['small_icons_url']) . '/' . $__templater->escape($__vars['icon']) . '" />
                            </li>
                        ';
			}
		}
		$__finalCompiled .= '
                    ';
	} else {
		$__finalCompiled .= '
                        ';
		if ($__templater->isTraversable($__vars['serverIconsData']['icons'])) {
			foreach ($__vars['serverIconsData']['icons'] AS $__vars['icon']) {
				$__finalCompiled .= '
                            <li data-value="' . $__templater->escape($__vars['icon']) . '" class="nitIcon ' . (($__vars['node']['xfa_nit_params'][$__vars['name']]['icon'] == $__vars['icon']) ? 'selected' : '') . '">
                                <img src="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '/' . $__templater->escape($__vars['icon']) . '" />
                            </li>
                        ';
			}
		}
		$__finalCompiled .= '
                    ';
	}
	$__finalCompiled .= '
                </ul>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Small Size
' . ' (px):</dt>
            <dd>' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[small_size]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['small_size'],
		'min' => '0',
		'step' => '1',
	)) . '</dd>
        </dl>

        <dl>
            <dt>' . 'Small icon preview
' . ':</dt>
            <dd>
                ';
	if ($__vars['serverIconsData']['small_icons']) {
		$__finalCompiled .= '
                    <div id="' . $__templater->escape($__vars['name']) . '_small_preview" data-preview-base-url="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['small_icons_url']) . '/">
                        ';
		if ($__vars['node']['xfa_nit_params'][$__vars['name']]['small_icon']) {
			$__finalCompiled .= '<img src="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['small_icons_url']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['small_icon']) . '" />';
		}
		$__finalCompiled .= '
                    </div>
                ';
	} else {
		$__finalCompiled .= '
                    <div id="' . $__templater->escape($__vars['name']) . '_small_preview" data-preview-base-url="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '/">
                        ';
		if ($__vars['node']['xfa_nit_params'][$__vars['name']]['small_icon']) {
			$__finalCompiled .= '<img src="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . $__templater->escape($__vars['serverIconsData']['icons_url']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params'][$__vars['name']]['small_icon']) . '" />';
		}
		$__finalCompiled .= '
                    </div>
                ';
	}
	$__finalCompiled .= '
            </dd>
        </dl>
    </div>
';
	return $__finalCompiled;
}
),
'xfa_nit_sprite' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'showSecondIcon' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    <div class="xfaNitSprite hiddenDiv">
        ';
	if ($__vars['showSecondIcon']) {
		$__finalCompiled .= '
            <div class="block tabbedBlock">
                <div class="block-container">
                    <h2 class="block-tabHeader tabs" data-xf-init="tabs" role="tablist">
                        <span class="hScroller-scroll">
                            <a href="#"
                               class="tabs-tab is-active" role="tab" aria-controls="read">' . 'Read Icon
' . '</a>
                            <a href="#"
                               class="tabs-tab" role="tab" aria-controls="unread">' . 'Unread Icon
' . '</a>
                        </span>
                    </h2>
                    <ul class="tabPanes">
                        <li class="is-active" role="tabpanel" id="read">
                            <div class="block-body">
                                ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_sprite_icon', array(
			'node' => $__vars['node'],
			'name' => 'sprite_icon1',
		), $__vars) . '
                            </div>
                        </li>
                        <li role="tabpanel" id="unread">
                            <div class="block-body">
                                ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_sprite_icon', array(
			'node' => $__vars['node'],
			'name' => 'sprite_icon2',
		), $__vars) . '
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            ';
	} else {
		$__finalCompiled .= '
            ' . $__templater->callMacro('xfa_nit_node_edit_macros', 'xfa_nit_sprite_icon', array(
			'node' => $__vars['node'],
			'name' => 'sprite_icon1',
		), $__vars) . '
        ';
	}
	$__finalCompiled .= '
    </div>
';
	return $__finalCompiled;
}
),
'xfa_nit_sprite_icon' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'name' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    <div class="' . $__templater->escape($__vars['name']) . '">
        <dl>
            <dt>' . 'Sprite URL
' . ':</dt>
            <dd>
                ' . $__templater->formTextBox(array(
		'name' => $__vars['name'] . '[icon]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['icon'],
	)) . '
                <div class="formRow-explain">' . 'Sprite file must be located in a directory of your forum, input in this field the url relative to your forum base url. eg. : styles/default/xenforo/node-sprite.png if I wanted to get xenforo nodes sprite.' . '</div>
            </dd>
        </dl>

        <dl>
            <dt>' . 'Position
' . ' (px):</dt>
            <dd>
                X: ' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[x]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['x'],
		'min' => '0',
		'step' => '1',
	)) . '
                Y: ' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[y]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['y'],
		'min' => '0',
		'step' => '1',
	)) . '
            </dd>
        </dl>

        <dl>
            <dt>' . 'Size
' . ' (px):</dt>
            <dd>' . $__templater->formNumberBox(array(
		'name' => $__vars['name'] . '[size]',
		'value' => $__vars['node']['xfa_nit_params'][$__vars['name']]['size'],
		'min' => '0',
		'step' => '1',
	)) . '</dd>
        </dl>

        <dl>
            <dt>' . 'Icon preview
' . ':</dt>
            <dd><div id="' . $__templater->escape($__vars['name']) . '_preview"></div></dd>
        </dl>
    </div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);