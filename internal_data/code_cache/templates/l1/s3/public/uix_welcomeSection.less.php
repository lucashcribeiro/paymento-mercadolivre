<?php
// FROM HASH: 4081a4425da3fd441bce591213dd16c3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (($__templater->func('property', array('uix_welcomeSectionLocation', ), false) == 'header') AND $__templater->func('property', array('uix_enableWelcomeHeaderImage', ), false)) {
		$__finalCompiled .= '
.uix_hasWelcomeSection .uix_headerContainer {
	background-image: @xf-uix_welcomeSection__style--background-image;

	.uix_welcomeSection:before {display: none;}

	> *:not(.p-navSticky), .p-nav, .p-sectionLinks {
		background: none;
		background: @xf-uix_welcomeSectionOverlay;
	}
}
';
	}
	$__finalCompiled .= '

.uix_welcomeSection {
	';
	if ($__templater->func('property', array('uix_pageStyle', ), false) == 'fixed') {
		$__finalCompiled .= '
	.m-pageWidth();
	';
	}
	$__finalCompiled .= '

	.uix_welcomeSection__inner {
		';
	if ($__templater->func('property', array('uix_pageStyle', ), false) != 'fixed') {
		$__finalCompiled .= '
		.m-pageWidth();
		';
	}
	$__finalCompiled .= '
	}

	.p-body-inner & {
		max-width: 100%;
		width: 100%;
		padding-left: 0;
		padding-right: 0;

		.pageContent {
			max-width: 100%;
			width: 100%;			
			padding-left: 0;
			padding-right: 0;
		}
	}
}

.p-pageWrapper .uix_welcomeSection {
	position: relative;
	.xf-uix_welcomeSection__style();

	';
	if ($__templater->func('property', array('uix_welcomeSectionLocation', ), false) == 'header') {
		$__finalCompiled .= '
	margin-bottom: 0;
	';
	}
	$__finalCompiled .= '

	.uix_welcomeSection__inner {
		position: relative;

		.xf-uix_welcomeSectionInner();
	}

	.uix_welcomeSection__title {.xf-uix_welcomeSectionTitle__style();}

	.uix_welcomeSection__text{.xf-uix_welcomeSectionText__style();}

	.uix_welcomeSection__icon {.xf-uix_welcomeSectionIcon__style();}

	&:before {
		content: \'\';
		position: absolute;
		left: 0;
		right: 0;
		bottom: 0;
		top: 0;
		background: @xf-uix_welcomeSectionOverlay;
	}
}';
	return $__finalCompiled;
}
);