<?php
// FROM HASH: 74f4215294bfd33d3ca9844c73d9c31d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.p-navEl:not(.is-selected) .p-navEl-link:before, .offCanvasMenu-linkHolder:not(.is-selected) .offCanvasMenu-link:before {
	background: linear-gradient(to right, @xf-uix_primaryColor, lighten(desaturate(spin(@xf-uix_primaryColor, 21), 1%), 11%), lighten(desaturate(spin(@xf-uix_primaryColor, 56), 1%), 18%));
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}

.p-navgroup.p-navgroup--guest {
	.p-navgroup-link i {display: none;}
	.p-navgroup-linkText {padding-left: 0;}
	
	.p-navgroup-link--logIn {
		margin-right: @xf-paddingMedium;
	}
	
	.button {
		padding-top: 0;
		padding-bottom: 0;
		color: @xf-buttonTextColor;
		
		&.button--primary {
			color: @xf-buttonPrimary--color;
		}
	}
}

.p-footer-inner .pageContent, .p-footer-copyrightRow .pageContent {
	width: 100%;
}

// welcome section

.uix_welcomeSection .button.button--cta {
	background: #fff;
	color: @xf-uix_primaryColor;

	&:hover, &:active, &:focus {
		background: @xf-uix_primaryColor;
		color: #fff;
	}
}

// sidebar

body .uix_postThreadWidget {border: none;}

.p-body-sidebar, .p-body-sidenav {
	.block {
		margin: 0;

		.block-container {
			border-radius: 0;
			border: none;
			box-shadow: @xf-uix_elevation1;
		}

		&:first-child .block-container {
			border-top-left-radius: @xf-borderRadiusMedium;
			border-top-right-radius: @xf-borderRadiusMedium;
		}

		&:last-child .block-container {
			border-bottom-left-radius: @xf-borderRadiusMedium;
			border-bottom-right-radius: @xf-borderRadiusMedium;
		}
	}
}

// nodes

.node {
	.pairs.pairs--rows {
		display: flex;
		flex-direction: column-reverse;

		> dt {
			line-height: 1;
			background: #eee;
			border-radius: 20px;
			padding: 4px;
			font-size: @xf-uix_iconSize;
		}
		
		dd {
			font-size: 1.6rem;
		}
	}
}

.node--unread .node-icon i {
	background: @xf-uix_primaryColor;
}

// third party

body .thfeature_firstPost .thfeature_firstPost_cover .thfeature_firstPost_header {
	background: @xf-pageBg;
}';
	return $__finalCompiled;
}
);