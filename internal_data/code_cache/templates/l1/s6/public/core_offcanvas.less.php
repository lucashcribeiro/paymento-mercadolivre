<?php
// FROM HASH: 7589dca8ec75a92691d7a2d976042272
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ################################## OFF CANVAS MENU #########################

@_offCanvas-animationLength: @xf-animationSpeed;

.offCanvasMenu
{
	display: none;
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: @zIndex-5;
	.m-transition(none; @_offCanvas-animationLength); // needed to keep the children displayed through animation
	.m-transform(scale(1)); // forces instant repaint in iOS

	// every tap on iOS causes a brief highlight, disable it for off canvas menu
	// then restore it for some tappable elements to retain it
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);

	pointer-events: none;

	> * {pointer-events: auto;}

	a
	{
		-webkit-tap-highlight-color: initial;
	}

	&.is-transitioning
	{
		display: block;
	}

	&.is-active
	{
		display: block;
	}

	.offCanvasMenu-hidden
	{
		display: none;
	}

	.offCanvasMenu-shown
	{
		display: block;
	}

	.offCanvasMenu-closer
	{
		float: right;
		cursor: pointer;
		text-decoration: none;
		-webkit-tap-highlight-color: initial;
		padding: @xf-paddingLarge;
		margin: -@xf-paddingLarge;

		&:hover
		{
			text-decoration: none;
		}

		&:after
		{
			.m-faBase();
			.m-faContent(@fa-var-times, .79em);
		}
	}

	.block-container,
	.blockMessage
	{
		margin-left: 0;
		margin-right: 0;
		border-radius: 0;
		border-left: none;
		border-right: none;
	}
}

.offCanvasMenu-shown
{
	display: none;
}

.offCanvasMenu-backdrop
{
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	background: rgba(0, 0, 0, .25);
	opacity: 0;
	.m-transition(all; @_offCanvas-animationLength; ease-in-out);

	.is-active &
	{
		opacity: 1;
	}
}

.offCanvasMenu-content
{
	position: relative;
	width: 280px;
	max-width: 85%;
	height: 100%;
	overflow: auto;
	.m-transition(all; @_offCanvas-animationLength; ease-in-out);
	-webkit-overflow-scrolling: touch;
	.xf-uix_canvas();

	.has-os-ios &
	{
		// accounts for iOS deadzone in Safari
		padding-bottom: 44px;
	}

	& when(@ltr)
	{
		.m-dropShadow(2px, 0, 5px, 0, .25);
		.m-transform(translateX(-280px));
	}

	& when(@rtl)
	{
		.m-dropShadow(-2px, 0, 5px, 0, .25);
		.m-transform(translateX(280px));
	}

	.is-active &
	{
		.m-transform(translateX(0));
	}

	.p-nav-content {
		margin-bottom: 96px;
	}
}

.offCanvasMenu-header
{
	padding: @xf-paddingLarge;
	margin: 0;
	font-size: @xf-fontSizeLarge;
	font-weight: @xf-fontWeightHeavy;
	background-color: @xf-contentHighlightBg;

	.m-clearFix();
	.m-hiddenLinks();

	&.offCanvasMenu-header--separated
	{
		margin-bottom: @xf-paddingLarge;
	}
}

.offCanvasMenu-row
{
	padding: @xf-paddingLarge;
}

.offCanvasMenu-separator
{
	padding: 0;
	margin: 0;
	border: none;
	border-top: 1px solid transparent;
}

.offCanvasMenu-link
{
	display: block;
	padding: @xf-paddingLarge;
	font-size: @xf-fontSizeLarge;
	text-decoration: inherit;

	&:hover
	{
		text-decoration: inherit;
	}

	&.offCanvasMenu-link--splitToggle
	{
		position: relative;
		text-decoration: inherit;

		&:before
		{
			content: \'\';
			position: absolute;
			left: 0;
			top: (@xf-paddingLarge - 4px);
			bottom: (@xf-paddingLarge - 4px);
			width: 0;
			border-left: 1px solid currentColor;
		}

		&:after
		{
			.m-faBase();
			.m-faContent(@fa-var-chevron-down, .88em);
		}

		&.is-active:after
		{
			.m-faContent(@fa-var-chevron-up, .88em);
		}
	}
}

.offCanvasMenu-linkHolder
{
	display: flex;

	&.is-selected
	{
		a
		{
			color: inherit;
		}

		.offCanvasMenu-link:first-child
		{
			padding-left: @xf-paddingLarge;
		}
	}

	.offCanvasMenu-link
	{
		flex-grow: 1;

		&.offCanvasMenu-link--splitToggle
		{
			flex-grow: 0;
		}

		&:hover
		{
			background: none;
		}
	}
}

.offCanvasMenu-list
{
	.m-listPlain();

	> li
	{
		border-top: @xf-borderSize solid transparent;
	}

	&:first-child > li:first-child
	{
		border-top: none;
	}
}

.offCanvasMenu-subList
{
	.m-listPlain();
	.m-transitionFadeDown();

	padding-bottom: @xf-paddingLargest;

	.offCanvasMenu-link
	{
		padding-left: @xf-paddingLarge;
		padding-top: @xf-paddingMedium;
		padding-bottom: @xf-paddingMedium;
		font-size: @xf-fontSizeSmall;
	}
}

.offCanvasMenu-installBanner
{
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: @xf-paddingLarge @xf-paddingMedium;
	font-size: @xf-fontSizeLarge;
}

.offCanvasMenu--blocks
{
	.offCanvasMenu-content
	{
		// .xf-pageBackground();
		// color: @xf-textColor;
	}

	.offCanvasMenu-header
	{
		color: @xf-textColorEmphasized;
		background: @xf-contentHighlightBg;
		border-bottom: @xf-borderSize solid @xf-borderColorHeavy;
	}

	.offCanvasMenu-separator
	{
		border-top-color: @xf-borderColor;
	}

	.offCanvasMenu-list > li
	{
		border-top-color: @xf-borderColor;
	}
}

.offCanvasMenu--nav
{
	.offCanvasMenu-content
	{
		// .xf-publicNav();
		font-size: @xf-fontSizeSmall;

		display: flex;
		flex-direction: column;

		a
		{
			color: inherit;
		}
	}

	.offCanvasMenu-header
	{
		background: @xf-publicHeaderAdjustColor;
		border-bottom: @xf-borderSize solid fadein(@xf-publicHeaderAdjustColor, 10%);
		.xf-uix_canvasHeader();
	}

	.offCanvasMenu-list
	{
		border-bottom: @xf-borderSize solid fadein(@xf-publicHeaderAdjustColor, 10%);

		a {
			.xf-uix_canvasNavItem();
			border-radius: 0;
			
			&:hover {.xf-uix_canvasNavItemHoverColor();}
		}
	}

	.offCanvasMenu-separator
	{
		border-top-color: fadein(@xf-publicHeaderAdjustColor, 10%);
	}

	.offCanvasMenu-link.offCanvasMenu-link--splitToggle:before
	{
		border-left-color: fadein(@xf-publicHeaderAdjustColor, 1%);
	}

	.offCanvasMenu-linkHolder
	{
		text-decoration: none;

		&:hover
		{
			// background: fadeout(@xf-publicHeaderAdjustColor, 6%);
		}

		&.is-selected
		{
			// .xf-publicNavSelected(no-border, no-border-radius);
			
			.xf-uix_canvasNavItemActive();

			.offCanvasMenu-link.offCanvasMenu-link--splitToggle:before
			{
				// border-left-color: fade(xf-default(@xf-publicNavSelected--color, transparent), 20%);
			}
		}
	}

	.offCanvasMenu-subList
	{
		background: @xf-publicHeaderAdjustColor;

		a {
			.xf-uix_canvasNavSubItem();

			&:hover {.xf-uix_canvasNavItemHoverColor();}
		}

		.offCanvasMenu-link:hover
		{
			text-decoration: none;
			// background: @xf-publicHeaderAdjustColor;
		}
	}

	.offCanvasMenu-list > li
	{
		border-top-color: @xf-publicHeaderAdjustColor;
	}

	.offCanvasMenu-installBanner
	{
		margin-top: auto;
		background: @xf-publicHeaderAdjustColor;
		border-top: @xf-borderSize solid fadein(@xf-publicHeaderAdjustColor, 10%);
	}
}';
	return $__finalCompiled;
}
);