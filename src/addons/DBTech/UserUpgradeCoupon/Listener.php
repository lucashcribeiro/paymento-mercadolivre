<?php

namespace DBTech\UserUpgradeCoupon;

class Listener
{
	/**
	 * The product ID (in the DBTech store)
	 * @var int
	 */
	protected static $_productId = 401;

	/**
	 * @param \XF\Pub\App $app
	 */
	public static function appPubSetup(\XF\Pub\App $app): void
	{
		
		
		/*DBTECH_BRANDING_START*/
		// Make sure we fetch the branding array from the application
		$branding = $app->offsetExists('dbtech_branding') ? $app->dbtech_branding : [];
		
		// Add productid to the array
		$branding[] = self::$_productId;
		
		// Store the branding
		$app->dbtech_branding = $branding;
		/*DBTECH_BRANDING_END*/
	}
}