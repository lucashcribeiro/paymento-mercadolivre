<?php
// FROM HASH: 55910fea90324284d8cf70bd9160331c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Redirecting to paypal');
	$__finalCompiled .= '

<div class="block">
    <div class="block-container" style="padding: 5px;">
		<script type="text/javascript">
			window.location.replace("' . $__templater->escape($__vars['redirect']) . '");
		</script>
        ' . 'xfa_core_you_are_being_redirected_to_paypal_please_wait' . '
	</div>
</div>';
	return $__finalCompiled;
}
);