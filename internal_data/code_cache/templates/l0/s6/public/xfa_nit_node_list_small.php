<?php
// FROM HASH: 36d3ed6e046c86836318518386f9d599
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['node']['xfa_nit_type'] == 1) {
		$__finalCompiled .= '
    <span class="xfa-nit-node-icon-small" aria-hidden="true">
    ';
		if ($__vars['extras']['hasNew'] AND $__vars['node']['xfa_nit_params']['fa_icon2']['layer_down']) {
			$__finalCompiled .= '
        ';
			if ($__vars['node']['xfa_nit_params']['fa_icon2']['layer_up']) {
				$__finalCompiled .= '
            <span class="fa-stack" style="font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['small_size']) . 'px;">
                <i class="fa fa-stack-2x ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down_color']) . ';"></i>
                <i class="fa fa-stack-1x ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_up']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_up_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_up_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_up_color']) . ';"></i>
            </span>
        ';
			} else {
				$__finalCompiled .= '
            <i class="fa ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['layer_down_color']) . ';  font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon2']['small_size']) . 'px;"></i>
        ';
			}
			$__finalCompiled .= '
    ';
		} else {
			$__finalCompiled .= '
        ';
			if ($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up']) {
				$__finalCompiled .= '
            <span class="fa-stack" style="font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['small_size']) . 'px;">
                <i class="fa fa-stack-2x ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_color']) . ';"></i>
                <i class="fa fa-stack-1x ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_up_color']) . ';"></i>
            </span>
        ';
			} else {
				$__finalCompiled .= '
            <i class="fa ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_transform']) . ' ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_animate']) . '" style="color: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['layer_down_color']) . '; font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['fa_icon1']['small_size']) . 'px;"></i>
        ';
			}
			$__finalCompiled .= '
    ';
		}
		$__finalCompiled .= '
    </span>
';
	} else if (($__vars['node']['xfa_nit_type'] == 2) OR ($__vars['node']['xfa_nit_type'] == 3)) {
		$__finalCompiled .= '
    <span class="xfa-nit-node-icon-small" aria-hidden="true"><i></i></span>
';
	} else if ($__vars['node']['xfa_nit_type'] == 5) {
		$__finalCompiled .= '
    <span class="xfa-nit-node-icon-small">' . $__templater->func('avatar', array($__vars['extras']['LastPoster'], 'xs', false, array(
			'notooltip' => 'true',
			'href' => '',
		))) . '</span>
';
	} else {
		$__finalCompiled .= '
    ';
		if ($__vars['node']['node_type_id'] == 'Forum') {
			$__finalCompiled .= '
	    ' . $__templater->fontAwesome(($__templater->escape($__templater->method($__vars['node']['Data']['TypeHandler'], 'getTypeIconClass', array())) ?: 'fa-comments'), array(
				'class' => 'subNodeLink-icon',
			)) . '
    ';
		} else {
			$__finalCompiled .= '
        <i></i>
    ';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);