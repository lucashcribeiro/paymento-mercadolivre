<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\Service\PayPal;

class SetExpressCheckout extends AbstractExpressCheckout
{
    protected $returnUrl;

    protected $cancelUrl;

    protected $buyerEmail;

    protected $item;

    protected $fees = null;

    protected $reqConfirmShipping = 1;

    public function __construct(\XF\App $app, $testingMode = false)
    {
        parent::__construct($app, $testingMode);
    }

    public function setURLs($returnUrl, $cancelUrl)
    {
        $this->returnUrl = $returnUrl;
        $this->cancelUrl = $cancelUrl;
    }

    public function setBuyerEmail($email)
    {
        $this->buyerEmail = $email;
    }

    public function setItem($transactionId, $title, $amount, $currency, $sellerEmail, $itemUrl, $description = '')
    {
        $this->item = [
            'transaction_id'    => $transactionId,
            'title'             => $title,
            'amount'            => $amount,
            'currency'          => $currency,
            'sellerEmail'       => $sellerEmail,
            'url'               => $itemUrl,
            'description'       => !empty($description) ? $description : \XF::phrase('xfa_core_purchase')->render() . ': ' . $title
        ];
    }

    public function setShipping($cost)
    {
        $this->item['shipping'] = $cost;
    }

    public function setFees($amount, $currency, $feesEmail)
    {
        $this->fees = [
            'amount'    => $amount,
            'currency'  => $currency,
            'email'     => $feesEmail
        ];
    }

    public function requireConfirmShipping($state)
    {
        if ($state)
        {
            $this->reqConfirmShipping = 1;
        }
        else
        {
            $this->reqConfirmShipping = 0;
        }
    }

    public function run()
    {
        /* Prepare the set checkout fields */
        $SECFields = array(
            'token'                 => '',
            'returnurl'             => $this->returnUrl,
            'cancelurl'             => $this->cancelUrl,
            'reqconfirmshipping'    => $this->reqConfirmShipping, 	// The value 1 indicates that you require that the customer's shipping address is Confirmed with PayPal.  This overrides anything in the account profile.  Possible values are 1 or 0.
            'noshipping'            => !$this->reqConfirmShipping,  // The value 1 indicates that on the PayPal pages, no shipping address fields should be displayed.  Maybe 1 or 0.
            'allownote'             => '1',                         // The value 1 indicates that the customer may enter a note to the merchant on the PayPal page during checkout.  The note is returned in the GetExpresscheckoutDetails response and the DoExpressCheckoutPayment response.  Must be 1 or 0.
            'addroverride'          => '',                          // The value 1 indicates that the PayPal pages should display the shipping address set by you in the SetExpressCheckout request, not the shipping address on file with PayPal.  This does not allow the customer to edit the address here.  Must be 1 or 0.
            'email'                 => $this->buyerEmail,
            'solutiontype'          => 'Mark',                      // Normal checkout
            'landingpage'           => 'Billing'                    // Billing page, not log-in page
        );

        /* Prepare the item payment info */
        $Payments = array();

        $Payment = array(
            'amt'                   => $this->item['amount'],
            'currencycode'          => $this->item['currency'],
            'desc'                  => $this->item['description'],
            'custom'                => $this->item['transaction_id'],
            'paymentaction'         => 'Sale',                                  // How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order.
            'paymentrequestid'      => $this->item['transaction_id'] . '-0',    // A unique identifier of the specific payment request, which is required for parallel payments.
            'sellerpaypalaccountid' => $this->item['sellerEmail']               // A unique identifier for the merchant.  For parallel payments, this field is required and must contain the Payer ID or the email address of the merchant.
        );

        if (isset($this->item['shipping']))
        {
            $Payment['itemamt'] 	 = $Payment['amt'];
            $Payment['amt'] 		+= $this->item['shipping'];
            $Payment['shippingamt']	 = $this->item['shipping'];
        }

        $PaymentOrderItems = array();
        $Item = array(
            'name'      => $this->item['title'],
            'desc'      => $this->item['title'],
            'amt'       => $this->item['amount'],
            'qty'       => '1',
            'itemurl'   => $this->item['url']
        );
        array_push($PaymentOrderItems, $Item);

        $Payment['order_items'] = $PaymentOrderItems;
        array_push($Payments, $Payment);

        /* If percentage on sale, prepare the payment info */
        if ($this->fees)
        {
            $Payment = array(
                'amt'                   => $this->fees['amount'],
                'currencycode'          => $this->fees['currency'],
                'desc'                  => \XF::phrase('xfa_core_admin_fees')->render() . ': ' . $this->item['title'],
                'custom'                => $this->item['transaction_id'],
                'paymentaction'         => 'Sale',                                  // How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order.
                'paymentrequestid'      => $this->item['transaction_id'] . '-1',    // A unique identifier of the specific payment request, which is required for parallel payments.
                'sellerpaypalaccountid' => $this->fees['email']                     // A unique identifier for the merchant.  For parallel payments, this field is required and must contain the Payer ID or the email address of the merchant.
            );

            $PaymentOrderItems = array();
            $Item = array(
                'name'      => \XF::phrase('xfa_core_admin_fees')->render(),
                'desc'      => \XF::phrase('xfa_core_admin_fees')->render(),
                'amt'       => $this->fees['amount'],
                'qty'       => '1',
                'itemurl'   => $this->item['url']
            );
            array_push($PaymentOrderItems, $Item);

            $Payment['order_items'] = $PaymentOrderItems;
            array_push($Payments, $Payment);
        }

        /* Launch the order */
        $PayPalRequest = array(
            'SECFields'  => $SECFields,
            'Payments'   => $Payments
        );

        $this->result = $this->PayPal->SetExpressCheckout($PayPalRequest);

        /* Check everything went fine */
        if ($this->result['ACK'] != 'Success')
        {
            $this->errors[] = \XF::phrase('xfa_core_error_initiating_paypal_communication');
        }
    }

    public function getToken()
    {
        return $this->result['TOKEN'];
    }

    public function getRedirectUrl()
    {
        return $this->result['REDIRECTURL'];
    }
}