<?php
// FROM HASH: bb73542dfd0c9b017e61ca910739b707
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('xfa_nit_node_list.less');
	$__finalCompiled .= '

<style type="text/css">
    ';
	if ($__vars['node']['xfa_nit_type'] == 1) {
		$__finalCompiled .= '
        /* Font Awesome */
        .nodeIcon.node_' . $__templater->escape($__vars['node']['node_id']) . '
        {
            background-image: none !important;
            background-position: 0 0 !important;
            height: ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px;
            width: ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px;
        }
    ';
	} else if ($__vars['node']['xfa_nit_type'] == 2) {
		$__finalCompiled .= '
        /* Server icon */
        .nodeIcon.node_' . $__templater->escape($__vars['node']['node_id']) . '
        {
            ';
		if ($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) {
			$__finalCompiled .= '
                background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) . '\') !important;
                background-position: 0 0 !important;
                background-size: ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px;
                height: ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px;
                width: ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px;
            ';
		}
		$__finalCompiled .= '
        }
    ';
	} else if ($__vars['node']['xfa_nit_type'] == 3) {
		$__finalCompiled .= '
        /* Sprite icon */
        .nodeIcon.node_' . $__templater->escape($__vars['node']['node_id']) . '
        {
            ';
		if ($__vars['node']['xfa_nit_params']['sprite_icon1']['icon']) {
			$__finalCompiled .= '
                background: url(\'' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['icon']) . '\') no-repeat -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['x']) . 'px -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['y']) . 'px !important;
                background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
                height: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
                width: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
            ';
		}
		$__finalCompiled .= '
        }
    ';
	}
	$__finalCompiled .= '
</style>

';
	if ($__vars['node']['xfa_nit_type'] == 1) {
		$__finalCompiled .= '
    <div class="nodeIcon node_' . $__templater->escape($__vars['node']['node_id']) . '">
        ';
		if ($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up']) {
			$__finalCompiled .= '
            <div class="fa-stack">
                <i class="fa fa-stack-2x ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_color']) . ';"></i>
                <i class="fa fa-stack-1x ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up_color']) . ';"></i>
            </div>
        ';
		} else {
			$__finalCompiled .= '
            <i class="fa fa-fw ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_color']) . '; font-size: ' . $__templater->escape($__vars['xf']['options']['xfa_nit_iconSizeACP']) . 'px;"></i>
        ';
		}
		$__finalCompiled .= '
    </div>
';
	} else {
		$__finalCompiled .= '
        <div class="nodeIcon node_' . $__templater->escape($__vars['node']['node_id']) . '">&nbsp;</div>
';
	}
	return $__finalCompiled;
}
);