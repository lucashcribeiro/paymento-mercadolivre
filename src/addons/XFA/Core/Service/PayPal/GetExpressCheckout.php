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

class GetExpressCheckout extends AbstractExpressCheckout
{
    protected $token;

    public function __construct(\XF\App $app, $testingMode = false)
    {
        parent::__construct($app, $testingMode);
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function run()
    {
        $this->result = $this->PayPal->GetExpressCheckoutDetails($this->token);

        /* Check everything went fine */
        if ($this->result['ACK'] != 'Success')
        {
            $this->errors[] = \XF::phrase('xfa_core_error_processing_payment');
        }
    }

    public function getAddress($usFormat = false)
    {
        $inputData = \XF::app()->inputFilterer()->filterArray($this->result, [
            'PAYMENTREQUEST_0_SHIPTOSTREET'         => 'str',
            'PAYMENTREQUEST_0_SHIPTOSTREET2'        => 'str',
            'PAYMENTREQUEST_0_SHIPTOCITY'           => 'str',
            'PAYMENTREQUEST_0_SHIPTOSTATE'          => 'str',
            'PAYMENTREQUEST_0_SHIPTOZIP'            => 'str',
            'PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME'    => 'str',
        ]);

        if ($usFormat)
        {
            $address = $inputData['PAYMENTREQUEST_0_SHIPTOSTREET'] . "\r\n"
                . ($inputData['PAYMENTREQUEST_0_SHIPTOSTREET2'] ? $inputData['PAYMENTREQUEST_0_SHIPTOSTREET2'] . "\r\n" : "")
                . $inputData['PAYMENTREQUEST_0_SHIPTOCITY'] . "\r\n"
                . ($inputData['PAYMENTREQUEST_0_SHIPTOSTATE'] && $inputData['PAYMENTREQUEST_0_SHIPTOSTATE'] != 'None' ? $inputData['PAYMENTREQUEST_0_SHIPTOSTATE'] . "\r\n" : "")
                . $inputData['PAYMENTREQUEST_0_SHIPTOZIP'] . "\r\n"
                . $inputData['PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME'];
        }
        else
        {
            $address = $inputData['PAYMENTREQUEST_0_SHIPTOSTREET'] . "\r\n"
                . ($inputData['PAYMENTREQUEST_0_SHIPTOSTREET2'] ? $inputData['PAYMENTREQUEST_0_SHIPTOSTREET2'] . "\r\n" : "")
                . $inputData['PAYMENTREQUEST_0_SHIPTOZIP'] . ' ' . $inputData['PAYMENTREQUEST_0_SHIPTOCITY'] . "\r\n"
                . ($inputData['PAYMENTREQUEST_0_SHIPTOSTATE'] && $inputData['PAYMENTREQUEST_0_SHIPTOSTATE'] != 'None' ? $inputData['PAYMENTREQUEST_0_SHIPTOSTATE'] . "\r\n" : "")
                . $inputData['PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME'];
        }

        return $address;
    }

    public function getName()
    {
        $inputData = \XF::app()->inputFilterer()->filterArray($this->result, [
            'PAYMENTREQUEST_0_SHIPTONAME' => 'str'
        ]);

        return $inputData['PAYMENTREQUEST_0_SHIPTONAME'];
    }

    public function getPhone()
    {
        $inputData = \XF::app()->inputFilterer()->filterArray($this->result, [
            'PAYMENTREQUEST_0_SHIPTOPHONENUM' => 'str'
        ]);

        return $inputData['PAYMENTREQUEST_0_SHIPTOPHONENUM'];
    }

    public function getNote()
    {
        $inputData = \XF::app()->inputFilterer()->filterArray($this->result, [
            'PAYMENTREQUEST_0_NOTETEXT' => 'str'
        ]);

        return $inputData['PAYMENTREQUEST_0_NOTETEXT'];
    }
}