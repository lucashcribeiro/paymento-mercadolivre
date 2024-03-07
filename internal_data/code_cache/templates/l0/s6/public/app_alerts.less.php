<?php
// FROM HASH: f2a48a969ab221b71f1494b7399a16b4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.alert
{
	&.is-unread
	{
		.xf-contentHighlightBase();
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