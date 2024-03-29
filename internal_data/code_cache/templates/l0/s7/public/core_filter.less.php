<?php
// FROM HASH: 2b3a7eba2a0dd0de4c3a5e222e48bc68
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ##################### FILTERING #####################

.filterBlock
{
	padding: @xf-paddingMedium;
	font-size: @xf-fontSizeSmaller;
	float: right;
	.xf-contentBase();
	.xf-blockBorder();
	border-radius: @xf-blockBorderRadius;
	.m-clearFix();

	.filterBlock-input
	{
		width: 150px;
		display: inline;
		font-size: @xf-fontSizeSmaller;

		&.filterBlock-input--small
		{
			width: 100px;
		}
	}

	select.filterBlock-input
	{
		width: auto;
	}
}

.quickFilter
{
	position: relative;

	.input
	{
		width: 180px;
		font-size: @xf-fontSizeSmaller;
	}

	label
	{
		font-size: @xf-fontSizeSmaller;
	}

	input[type=checkbox]
	{
		.m-checkboxAligner();
	}

	.js-filterClear
	{
		color: @controlColor;

		&:hover
		{
			color: @controlColor--hover;
		}

		&:before
		{
			.m-faBase();
			.m-faContent(@fa-var-times);
		}
	}
}

.filterBar
{
	.m-clearFix();
}

.filterBar-filters
{
	.m-listPlain();
	display: inline;

	> li
	{
		display: inline;
	}
}

.filterBar-filterToggle
{
	display: inline-block;
	text-decoration: none;
	color: inherit;
	padding: 1px 8px;
	border-radius: @xf-borderRadiusMedium;
	.m-transition();

	&:after
	{
		.m-faBase();
		font-size: 80%;
		.m-faContent(" @{fa-var-times}");
		opacity: .5;
		.m-transition(opacity);
	}

	&:hover
	{
		text-decoration: none;

		&:after
		{
			opacity: 1;
		}
	}
}

.filterBar-filterToggle-label
{
	opacity: .75;
}

.filterBar-menuTrigger
{
	float: right;
	white-space: nowrap;
	border-radius: @xf-borderRadiusMedium;
	text-decoration: none;
	padding: 1px  5px;
	.xf-uix_buttonSmall();

	&:after
	{
		.m-menuGadget();
	}
}

@media (max-width: @xf-responsiveMedium)
{
	.filterBar-filterToggle-label
	{
		display: none;
	}
}';
	return $__finalCompiled;
}
);