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

abstract class AbstractExpressCheckout extends \XF\Service\AbstractService
{
    /** @var \angelleye\PayPal\PayPal $PayPal */
    protected $PayPal;

    protected $result = null;

    protected $errors = null;

    public function __construct(\XF\App $app, $testingMode = false)
    {
        parent::__construct($app);

        require_once(\XF::getRootDirectory() . '/src/addons/XFA/Core/vendor/AngellEye/paypal-php-library/autoload.php');
        require_once(\XF::getRootDirectory() . '/' . \XF::app()->config()['internalDataPath'] . '/PPConfiguration.php');

        /* Get API configuration depending on mode */
        if ($testingMode)
        {
            $PayPalConfig = \angelleye\PayPal\PPConfiguration::getConfig('sandbox');
        }
        else
        {
            $PayPalConfig = \angelleye\PayPal\PPConfiguration::getConfig('live');
        }

        /* Configure API */
        $this->PayPal = new \angelleye\PayPal\PayPal($PayPalConfig);
    }

    public function hasErrors()
    {
        return (is_array($this->errors) && (count($this->errors) > 0));
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getResult()
    {
        return $this->result;
    }

    abstract public function run();
}