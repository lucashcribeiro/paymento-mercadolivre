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

class DoExpressCheckout extends AbstractExpressCheckout
{
    protected $expressCheckoutDetails;

    protected $token;

    protected $item;

    protected $fees = null;

    public function __construct(\XF\App $app, $testingMode = false)
    {
        parent::__construct($app, $testingMode);
    }

    public function setExpressCheckoutDetails($expressCheckoutDetails)
    {
        $this->expressCheckoutDetails = $expressCheckoutDetails;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setItem($transactionId, $title, $amount, $currency, $sellerEmail, $itemUrl)
    {
        $this->item = [
            'transaction_id'    => $transactionId,
            'title'             => $title,
            'amount'            => $amount,
            'currency'          => $currency,
            'sellerEmail'       => $sellerEmail,
            'url'               => $itemUrl
        ];
    }

    public function setFees($amount, $currency, $feesEmail)
    {
        $this->fees = [
            'amount'    => $amount,
            'currency'  => $currency,
            'email'     => $feesEmail
        ];
    }

    public function setShipping($cost)
    {
        $this->item['shipping'] = $cost;
    }

    public function run()
    {
        /* Prepare the doExpressCheckout fields */
        $DECPFields = array(
            'token'                 => $this->token, 							    // Required.  A timestamped token, the value of which was returned by a previous SetExpressCheckout call.
            'payerid'               => $this->expressCheckoutDetails['PAYERID'], 	// Required.  Unique PayPal customer id of the payer.  Returned by GetExpressCheckoutDetails, or if you used SKIPDETAILS it's returned in the URL back to your RETURNURL.
            'returnfmfdetails'      => '1' 					                        // Flag to indicate whether you want the results returned by Fraud Management Filters or not.  1 or 0.
        );

        /* Prepare the item payment info */
        $Payments = array();

        $Payment = array(
            'amt'                   => $this->item['amount'],
            'currencycode'          => $this->item['currency'],
            'desc'                  => \XF::phrase('xfa_core_purchase')->render() . ': ' . $this->item['title'],
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
            'DECPFields'    => $DECPFields,
            'Payments'      => $Payments
        );

        $this->result = $this->PayPal->DoExpressCheckoutPayment($PayPalRequest);

        /* Check everything went fine */
        if ($this->result['ACK'] != 'Success')
        {
            $this->errors[] = \XF::phrase('xfa_core_error_processing_payment');
        }
    }

    public function getPaymentInfo()
    {
        return [
            'status'                => $this->result['PAYMENTINFO_0_PAYMENTSTATUS'],
            'transaction_id'        => $this->result['PAYMENTINFO_0_TRANSACTIONID'],
            'pos_transaction_id'    => isset($this->result['PAYMENTINFO_1_TRANSACTIONID']) ? $this->result['PAYMENTINFO_1_TRANSACTIONID'] : 0,
            'fees_amount'           => isset($this->result['PAYMENTINFO_0_FEEAMT']) ? $this->result['PAYMENTINFO_0_FEEAMT'] : 0,
            'pos_amount'            => isset($this->result['PAYMENTINFO_1_AMT']) ? $this->result['PAYMENTINFO_1_AMT'] : 0
        ];
    }
}