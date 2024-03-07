<?php
// FROM HASH: a399576d9299fc6b731e80a2c4e571c8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.xfa-nit-node-icon
{
	display: table-cell;
	vertical-align: middle;
	text-align: center;
	width: 46px;
	padding: @xf-paddingLarge 0 @xf-paddingLarge @xf-paddingLarge;
}

.block--category
{
	.block-header
	{
		.xfa-nit-node-icon
		{
			display: inline;
			vertical-align: middle;
			text-align: center;
			width: 46px;
			padding: 0px
		}
	}

	';
	if ($__templater->isTraversable($__vars['nodes'])) {
		foreach ($__vars['nodes'] AS $__vars['nodeId'] => $__vars['node']) {
			$__finalCompiled .= '
		';
			if ($__vars['node']['xfa_nit_type'] == 2) {
				$__finalCompiled .= '
			/* Server icon */
			&.block--category' . $__templater->escape($__vars['nodeId']) . '
			{
				.block-header .xfa-nit-node-icon i
				{
					';
				if ($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) {
					$__finalCompiled .= '
					background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) . '\') !important;
					background-position: 0 0 !important;
					background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
					background-repeat: no-repeat;
					';
				}
				$__finalCompiled .= '
				}
			}

			&.block--category' . $__templater->escape($__vars['nodeId']) . ' .block-header
			{
				i
				{
					font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
				}

				i:before
				{
					.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px);
				}
			}
		';
			} else if ($__vars['node']['xfa_nit_type'] == 3) {
				$__finalCompiled .= '
			/* Sprite icon */
			&.block--category' . $__templater->escape($__vars['nodeId']) . '
			{
				.block-header .xfa-nit-node-icon i
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
			}

			&.block--category' . $__templater->escape($__vars['nodeId']) . ' .block-header
			{
				i
				{
					font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
				}

				i:before
				{
					.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px);
				}
			}
		';
			}
			$__finalCompiled .= '
	';
		}
	}
	$__finalCompiled .= '
}

.node
{
	';
	if ($__templater->isTraversable($__vars['nodes'])) {
		foreach ($__vars['nodes'] AS $__vars['nodeId'] => $__vars['node']) {
			$__finalCompiled .= '
		';
			if ($__vars['node']['xfa_nit_type'] == 2) {
				$__finalCompiled .= '
			/* Server icon */
			&.node--id' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon i
			{
				';
				if ($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) {
					$__finalCompiled .= '
				background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) . '\') !important;
				background-position: 0 0 !important;
				background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
				background-repeat: no-repeat;
				';
				}
				$__finalCompiled .= '
			}

			&.node--id' . $__templater->escape($__vars['nodeId']) . '.node--unread .xfa-nit-node-icon i
			{
				';
				if ($__vars['node']['xfa_nit_params']['srv_icon2']['icon']) {
					$__finalCompiled .= '
					background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['icon']) . '\') !important;
					background-position: 0 0 !important;
					background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['size']) . 'px;
					background-repeat: no-repeat;
				';
				} else if ($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) {
					$__finalCompiled .= '
					background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) . '\') !important;
					background-position: 0 0 !important;
					background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
					background-repeat: no-repeat;
				';
				}
				$__finalCompiled .= '
			}

			&.node--id' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon
			{
				i
				{
					display: block;
					line-height: 1.125;
					font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
				}

				i:before
				{
					.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px);
				}
			}
		';
			} else if ($__vars['node']['xfa_nit_type'] == 3) {
				$__finalCompiled .= '
			/* Sprite icon */
			&.node--id' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon i
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

			&.node--id' . $__templater->escape($__vars['nodeId']) . '.node--unread .xfa-nit-node-icon i
			{
				';
				if ($__vars['node']['xfa_nit_params']['sprite_icon2']['icon']) {
					$__finalCompiled .= '
				background: url(\'' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['icon']) . '\') no-repeat -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['x']) . 'px -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['y']) . 'px !important;
				background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['size']) . 'px;
				height: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
				width: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
				';
				}
				$__finalCompiled .= '
			}

			&.node--id' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon
			{
				i
				{
					display: block;
					line-height: 1.125;
					font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
				}

				i:before
				{
					.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px);
				}
			}
		';
			}
			$__finalCompiled .= '
	';
		}
	}
	$__finalCompiled .= '
}

.subNodeLink
{
	.xfa-nit-node-icon-small
	{
		display: inline;
		vertical-align: middle;
		text-align: center;
		width: 46px;
		padding: 0px
	}

	';
	if ($__templater->isTraversable($__vars['nodes'])) {
		foreach ($__vars['nodes'] AS $__vars['nodeId'] => $__vars['node']) {
			$__finalCompiled .= '
		';
			if ($__vars['node']['xfa_nit_type'] != 0) {
				$__finalCompiled .= '
		    &.node--id' . $__templater->escape($__vars['nodeId']) . '
		    {
				&:before
				{
					content: none;
				}
		    }
		';
			}
			$__finalCompiled .= '

		';
			if ($__vars['node']['xfa_nit_type'] == 2) {
				$__finalCompiled .= '
			/* Server icon */
			&.node--id' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon-small i
			{
				';
				if ($__vars['node']['xfa_nit_params']['srv_icon1']['small_icon']) {
					$__finalCompiled .= '
				background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_icon']) . '\') !important;
				background-position: 0 0 !important;
				background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_size']) . 'px;
				background-repeat: no-repeat;
				';
				}
				$__finalCompiled .= '
			}

			&.node--id' . $__templater->escape($__vars['nodeId']) . '.subNodeLink--unread .xfa-nit-node-icon-small i
			{
				';
				if ($__vars['node']['xfa_nit_params']['srv_icon2']['small_icon']) {
					$__finalCompiled .= '
					background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['small_icon']) . '\') !important;
					background-position: 0 0 !important;
					background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['small_size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['small_size']) . 'px;
					background-repeat: no-repeat;
				';
				} else if ($__vars['node']['xfa_nit_params']['srv_icon1']['small_icon']) {
					$__finalCompiled .= '
					background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_icon']) . '\') !important;
					background-position: 0 0 !important;
					background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_size']) . 'px;
					background-repeat: no-repeat;
				';
				}
				$__finalCompiled .= '
			}

			&.node--id' . $__templater->escape($__vars['nodeId']) . '
			{
				i
				{
					display: inline;
					line-height: 1.125;
					font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_size']) . 'px;
				}
				i:before
				{
					.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['small_size']) . 'px);
				}
			}
		';
			} else if ($__vars['node']['xfa_nit_type'] == 3) {
				$__finalCompiled .= '
			/* Sprite icon */
			&.node--id' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon-small i
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

			&.node--id' . $__templater->escape($__vars['nodeId']) . '.subNodeLink--unread .xfa-nit-node-icon-small i
			{
				';
				if ($__vars['node']['xfa_nit_params']['sprite_icon2']['icon']) {
					$__finalCompiled .= '
				background: url(\'' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['icon']) . '\') no-repeat -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['x']) . 'px -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['y']) . 'px !important;
				background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['size']) . 'px;
				height: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
				width: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
				';
				}
				$__finalCompiled .= '
			}

			&.node--id' . $__templater->escape($__vars['nodeId']) . '
			{
				i
				{
					display: inline;
					line-height: 1.125;
					font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
				}

				i:before
				{
					.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px);
				}
			}
		';
			} else if ($__vars['node']['xfa_nit_type'] == 5) {
				$__finalCompiled .= '
			&.node--id' . $__templater->escape($__vars['nodeId']) . '
			{
				.avatar
				{
					width: 13px;
					height: 13px;
					font-size: 9px;
					margin-top: 2px;
				}
			}
		';
			}
			$__finalCompiled .= '
	';
		}
	}
	$__finalCompiled .= '
}

';
	if ($__templater->isTraversable($__vars['nodes'])) {
		foreach ($__vars['nodes'] AS $__vars['nodeId'] => $__vars['node']) {
			$__finalCompiled .= '
	';
			if ($__vars['node']['xfa_nit_type'] == 2) {
				$__finalCompiled .= '
		/* Server icon */
		&.node-header-' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon i
		{
			';
				if ($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) {
					$__finalCompiled .= '
			background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) . '\') !important;
			background-position: 0 0 !important;
			background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
			background-repeat: no-repeat;
			';
				}
				$__finalCompiled .= '
		}

		&.node-header-' . $__templater->escape($__vars['nodeId']) . '.node--unread .xfa-nit-node-icon i
		{
			';
				if ($__vars['node']['xfa_nit_params']['srv_icon2']['icon']) {
					$__finalCompiled .= '
				background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['icon']) . '\') !important;
				background-position: 0 0 !important;
				background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon2']['size']) . 'px;
				background-repeat: no-repeat;
			';
				} else if ($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) {
					$__finalCompiled .= '
				background-image: url(\'' . $__templater->escape($__vars['iconsUrl']) . '/' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['icon']) . '\') !important;
				background-position: 0 0 !important;
				background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
				background-repeat: no-repeat;
			';
				}
				$__finalCompiled .= '
		}

		&.node-header-' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon
		{
			i
			{
				display: block;
				line-height: 1.125;
				font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
			}

			i:before
			{
				.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px);
			}
		}
	';
			} else if ($__vars['node']['xfa_nit_type'] == 3) {
				$__finalCompiled .= '
		/* Sprite icon */
		&.node-header-' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon i
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

		&.node-header-' . $__templater->escape($__vars['nodeId']) . '.node--unread .xfa-nit-node-icon i
		{
			';
				if ($__vars['node']['xfa_nit_params']['sprite_icon2']['icon']) {
					$__finalCompiled .= '
			background: url(\'' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['icon']) . '\') no-repeat -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['x']) . 'px -' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['y']) . 'px !important;
			background-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['size']) . 'px ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon2']['size']) . 'px;
			height: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
			width: ' . $__templater->escape($__vars['node']['xfa_nit_params']['sprite_icon1']['size']) . 'px;
			';
				}
				$__finalCompiled .= '
		}

		&.node-header-' . $__templater->escape($__vars['nodeId']) . ' .xfa-nit-node-icon
		{
			i
			{
				display: block;
				line-height: 1.125;
				font-size: ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px;
			}

			i:before
			{
				.m-faContent(" ", ' . $__templater->escape($__vars['node']['xfa_nit_params']['srv_icon1']['size']) . 'px);
			}
		}
	';
			}
			$__finalCompiled .= '
';
		}
	}
	return $__finalCompiled;
}
);