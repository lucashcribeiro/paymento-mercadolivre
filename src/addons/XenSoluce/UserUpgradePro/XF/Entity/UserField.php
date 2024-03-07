<?php

namespace XenSoluce\UserUpgradePro\XF\Entity;

use XF\Mvc\Entity\Structure;

class UserField extends XFCP_UserField
{
	public static function getStructure(Structure $structure)
	{
	    $structure = parent::getStructure($structure);
		$structure->columns += [
			'xs_uup_enable_invoice' => ['type' => self::BOOL, 'default' => false],
		];
		return $structure;
	}
}