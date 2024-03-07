<?php
// FROM HASH: 5e6f9fbd8e8b0617436f684bde6e7ab4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.alert
{
	&.is-unread
	{
		.xf-contentHighlightBase();
		
		.contentRow-main {
			font-weight: @xf-fontWeightHeavy;
			
			.contentRow-minor {font-weight: @xf-fontWeightNormal;}
		}
	}
}

.alertToggler
{
	text-decoration: none !important;
	padding: @xf-paddingMedium;
	margin-right: -@xf-paddingMedium;

	.alert &
	{
		opacity: 0;
	}

	.alert:hover &,
	.has-touchevents &
	{
		opacity: 1;
	}
}

.alertToggler-icon
{
	font-size: .75em;
	font-weight: min(@xf-fontAwesomeWeight, @faWeight-regular);

	.is-unread &
	{
		font-weight: @faWeight-solid;
	}
}

';
	if ($__templater->func('property', array('uix_iconFontFamily', ), false) != 'fontawesome') {
		$__finalCompiled .= '
.alert {
	.alertToggler-icon:before {content: \'\\F0766\';}
	&.is-unread .alertToggler-icon:before {content: \'\\F0765\';}
}
';
	}
	return $__finalCompiled;
}
);