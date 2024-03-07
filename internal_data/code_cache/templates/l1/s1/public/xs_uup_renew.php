<?php
// FROM HASH: a28c9bf2c82e4f841f4641abd8951305
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Renew');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<ul class="block-body">
			<li>
				';
	$__compilerTemp1 = '';
	if (($__templater->func('count', array($__vars['upgrade']['payment_profile_ids'], ), false) > 1)) {
		$__compilerTemp1 .= '
								';
		$__compilerTemp2 = array(array(
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'Choose a payment method' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['upgrade']['payment_profile_ids'])) {
			foreach ($__vars['upgrade']['payment_profile_ids'] AS $__vars['profileId']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['profileId'],
					'label' => $__templater->escape($__vars['profiles'][$__vars['profileId']]),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1 .= $__templater->formSelect(array(
			'name' => 'payment_profile_id',
		), $__compilerTemp2) . '
								<span class="inputGroup-splitter"></span>
								' . $__templater->button('', array(
			'type' => 'submit',
			'icon' => 'purchase',
		), '', array(
		)) . '
								';
	} else {
		$__compilerTemp1 .= '
								' . $__templater->button('', array(
			'type' => 'submit',
			'icon' => 'purchase',
		), '', array(
		)) . '
								' . $__templater->formHiddenVal('payment_profile_id', $__templater->filter($__vars['upgrade']['payment_profile_ids'], array(array('first', array()),), false), array(
		)) . '
							';
	}
	$__finalCompiled .= $__templater->form('
					' . $__templater->formHiddenVal('durations', 'no', array(
		'id' => 'duration',
	)) . '
					' . $__templater->formHiddenVal('renew', 'no', array(
	)) . '
					' . $__templater->formRow('
						<div class="inputGroup">
							' . $__compilerTemp1 . '
						</div>
					', array(
		'rowtype' => 'button',
		'label' => $__templater->escape($__vars['upgrade']['title']),
		'hint' => $__templater->escape($__vars['upgrade']['cost_phrase']),
		'explain' => $__templater->filter($__vars['upgrade']['description'], array(array('raw', array()),), true),
	)) . '
				', array(
		'action' => $__templater->func('link', array('purchase', $__vars['upgrade'], array('user_upgrade_id' => $__vars['upgrade']['user_upgrade_id'], ), ), false),
		'ajax' => 'true',
		'data-xf-init' => 'payment-provider-container',
	)) . '
				<div class="js-paymentProviderReply-user_upgrade' . $__templater->escape($__vars['upgrade']['user_upgrade_id']) . '"></div>
			</li>
		</ul>
	</div>
</div>';
	return $__finalCompiled;
}
);