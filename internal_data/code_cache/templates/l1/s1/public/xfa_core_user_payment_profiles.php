<?php
// FROM HASH: 58ec1610b77a39c3c433887a86f05b55
return array(
'macros' => array('braintree' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'active' => '!',
		'configuration' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[braintree][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '
	
	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[braintree][merchant_id]',
		'value' => $__vars['configuration']['merchant_id'],
	), array(
		'label' => 'Merchant ID',
	)) . '
	
	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[braintree][public_key]',
		'value' => $__vars['configuration']['public_key'],
	), array(
		'label' => 'Public key',
	)) . '
	
	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[braintree][private_key]',
		'value' => $__vars['configuration']['private_key'],
	), array(
		'label' => 'Private key',
		'explain' => 'Enter the API keys and Merchant ID from the Account > My User > API Keys, Tokenization Keys, Encryption Keys > View Authorizations page in your <a href="https://www.braintreegateway.com/" target="_blank">Braintree Account</a>.<br />
<br />
If you wish to enable PayPal support, please <a href="https://articles.braintreepayments.com/guides/paypal/setup-guide#enter-your-paypal-credentials-in-the-braintree-control-panel" target="_blank">follow the instructions</a>.',
	)) . '
	
	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[braintree][merchant_account]',
		'value' => $__vars['configuration']['merchant_account'],
	), array(
		'label' => 'Merchant account ID',
		'explain' => 'The merchant account ID is listed under the Settings > Processing page.<br />
<br />
<b>Note:</b> By default, Braintree does not support multiple currencies. The currency value you may select for your purchasable items <b><i>will be ignored</i></b>.<br />
<br />
To support multiple currencies, you need to set this up by <a href="mailto:support@braintreepayments.com">contacting Braintree</a> and ask them to create multiple Merchant Accounts. It is the Merchant Account which dictates which currency transactions will be processed in. You must specify which Merchant Account to use here.',
	)) . '
	
	<hr class="formRowSep" />
	
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[braintree][paypal_enable]',
		'selected' => $__vars['configuration_enable'],
		'label' => '
			' . 'Enable PayPal support' . '
		',
		'_type' => 'option',
	)), array(
		'explain' => 'Requires a PayPal Business account and additional setup in your Braintree Dashboard.',
	)) . '
	
	
	' . $__templater->formHiddenVal('configuration[braintree][plan_id]', '', array(
	)) . '
	' . $__templater->formHiddenVal('configuration[braintree][apple_pay_enable]', '0', array(
	)) . '
';
	return $__finalCompiled;
}
),
'paypal' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'active' => '!',
		'configuration' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[paypal][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[paypal][primary_account]',
		'value' => $__vars['configuration']['primary_account'],
		'type' => 'email',
	), array(
		'label' => 'PayPal Primary Account Email',
		'hint' => 'Required',
		'explain' => '
			' . 'This is the primary email address on your PayPal account. If this is incorrect, payments may not be processed successfully. Note this must be a PayPal Premier or Business account and IPNs must be enabled.' . '
		',
	)) . '

	' . $__templater->formHiddenVal('configuration[paypal][require_address]', '0', array(
	)) . '

	' . $__templater->formHiddenVal('configuration[paypal][alternate_accounts]', '', array(
	)) . '
';
	return $__finalCompiled;
}
),
'stripe' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'active' => '!',
		'configuration' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[stripe][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '
	
	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[stripe][live_publishable_key]',
		'value' => $__vars['configuration']['live_publishable_key'],
	), array(
		'label' => 'Live publishable key',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[stripe][live_secret_key]',
		'value' => $__vars['configuration']['live_secret_key'],
	), array(
		'label' => 'Live secret key',
		'explain' => 'Enter the live secret and publishable keys from your Stripe dashboard on the <a href="https://dashboard.stripe.com/account/apikeys" target="_blank">Developers > API keys</a> page. You also need to set up a webhook on the <a href="https://dashboard.stripe.com/account/webhooks">Developers > Webhooks</a> page.',
	)) . '

	<hr class="formRowSep" />

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[stripe][statement_descriptor]',
		'value' => $__vars['configuration']['statement_descriptor'],
		'minlength' => '5',
		'maxlength' => '22',
	), array(
		'label' => 'Statement descriptor',
		'explain' => 'Statement descriptors explain charges or payments on bank statements. Leaving this empty will use the board title. If you wish to set a custom descriptor, it must follow the format <a href="https://stripe.com/docs/statement-descriptors#requirements" target="_blank">outlined in Stripe\'s documentation</a>.',
	)) . '

	<hr class="formRowSep" />

	' . $__templater->formRow('
		<div class="formRow-explain">
			' . '<strong>Note:</strong> You must set up a webhook endpoint so that Stripe can send messages in order to verify and process payments. You can do this on the <a href="https://dashboard.stripe.com/account/webhooks">Developers > Webhooks</a> page in your dashboard with the following URL:
		<pre><code>' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/payment_callback.php?_xfProvider=stripe</code></pre>
		You should also configure your webhook endpoint to listen for the following events:' . '
		</div>
	', array(
		'label' => '',
	)) . '

	<hr class="formRowSep" />

	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'label' => 'Verify webhook with signing secret' . $__vars['xf']['language']['label_separator'],
		'selected' => $__vars['configuration']['signing_secret'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'configuration[stripe][signing_secret]',
		'value' => $__vars['configuration']['signing_secret'],
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'To verify incoming webhook signatures and prevent replay attacks you must provide the &quot;Signing secret&quot;. You can obtain this after setting up the webhook endpoint by clicking the endpoint in your dashboard on the <a href="https://dashboard.stripe.com/account/webhooks">Developers > Webhooks</a> page.',
	)) . '

	<hr class="formRowSep" />
		
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[stripe][payment_request_api_enable]',
		'selected' => $__vars['configuration']['payment_request_api_enable'],
		'label' => '
			' . 'Enable Payment Request API support' . '
		',
		'_type' => 'option',
	)), array(
		'explain' => 'The <a href="https://w3c.github.io/payment-request/" target="_blank">Payment Request API</a> is a browser standard which allows customers with a compatible browser to pay for goods and services without having to re-enter their payment details.<br />
<br />
If enabled, users will be able to pay with Apple Pay, Android Pay, Google Pay and Microsoft Pay in addition to a valid credit/debit card. <a href="https://dashboard.stripe.com/account/apple_pay" target="_blank">Apple Pay requires additional set up in your Stripe Dashboard</a>.',
	)) . '

	' . $__templater->formHiddenVal('configuration[stripe][stripe_country]', $__vars['configuration']['stripe_country'], array(
	)) . '
	' . $__templater->formHiddenVal('configuration[stripe][test_publishable_key]', '', array(
	)) . '
	' . $__templater->formHiddenVal('configuration[stripe][test_secret_key]', '', array(
	)) . '
';
	return $__finalCompiled;
}
),
'twocheckout' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'configuration' => '!',
		'active' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[twocheckout][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[twocheckout][account_number]',
		'value' => $__vars['configuration']['account_number'],
	), array(
		'label' => 'Account number',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[twocheckout][secret_word]',
		'value' => $__vars['configuration']['secret_word'],
	), array(
		'label' => 'Secret word',
		'explain' => 'Your account number is available in your <a href="https://www.2checkout.com/login" target="_blank">2Checkout Account</a>. When logged in to your account you can set your Secret Word by going to Account > Site Management.',
	)) . '
';
	return $__finalCompiled;
}
),
'ncp_coinbase_commerce' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'configuration' => '!',
		'active' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[ncp_coinbase_commerce][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[ncp_coinbase_commerce][api_key]',
		'value' => $__vars['configuration']['api_key'],
	), array(
		'label' => 'ncp_cc_api_key',
		'explain' => 'Enter your API key for Coinbase Commerce. You can find this <a href="https://commerce.coinbase.com/dashboard/settings">here</a>. Additionally, you may also need to whitelist our domain on that page (board URL is: ' . $__templater->escape($__vars['xf']['options']['boardUrl']) . ').',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[ncp_coinbase_commerce][webhook_secret]',
		'value' => $__vars['configuration']['webhook_secret'],
	), array(
		'label' => 'ncp_cc_webhook_secret',
		'explain' => 'The key for your webhook secret. Found on the <a href="https://commerce.coinbase.com/dashboard/settings">Coinbase Commerce settings page</a>. You will also need to add the callback URL in the same location. Click "Add an endpoint" and add: ' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/' . 'payment_callback.php?_xfProvider=ncp_coinbase_commerce' . '',
	)) . '
';
	return $__finalCompiled;
}
),
'mollie' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'configuration' => '!',
		'active' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[mollie][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[mollie][live_api_key]',
		'value' => $__vars['configuration']['live_api_key'],
	), array(
		'label' => 'nm_mollie_live_secret_key',
		'explain' => 'nm_mollie_live_secret_key_explain',
	)) . '
';
	return $__finalCompiled;
}
),
'pbp_btcpay' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'configuration' => '!',
		'active' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'configuration[pbp_btcpay][active]',
		'value' => '1',
		'checked' => ($__vars['active'] ? true : false),
		'label' => 'Accept this payment mean',
		'_type' => 'option',
	)), array(
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[pbp_btcpay][api_url]',
		'value' => $__vars['configuration']['api_url'],
		'type' => 'url',
		'required' => 'true',
	), array(
		'explain' => 'pbp_btcpay_api_url_explain',
		'label' => 'pbp_btcpay_api_url',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[pbp_btcpay][store_id]',
		'value' => $__vars['configuration']['store_id'],
		'required' => 'true',
	), array(
		'explain' => 'pbp_btcpay_store_id_explain',
		'label' => 'pbp_btcpay_store_id',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[pbp_btcpay][api_key]',
		'value' => $__vars['configuration']['api_key'],
		'required' => 'true',
	), array(
		'label' => 'pbp_btcpay_api_key',
		'explain' => 'pbp_btcpay_api_key_explain',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'configuration[pbp_btcpay][webhook_secret]',
		'required' => 'true',
		'value' => $__vars['configuration']['webhook_secret'],
	), array(
		'label' => 'pbp_btcpay_webhook_secret',
		'explain' => 'pbp_btcpay_webhook_secret_explain',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);