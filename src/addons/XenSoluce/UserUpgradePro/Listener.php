<?php

namespace XenSoluce\UserUpgradePro;

class Listener
{
   	public static function criteriaUser($rule, array $data, \XF\Entity\User $user, &$returnValue)
	{
	    $repo = \XF::em()->getRepository('XenSoluce\UserUpgradePro:ExpiringUserUpgrade');
		switch ($rule)
		{
            case 'XsUserUpgradeExpired':
                $returnValue = $user->canViewXsActiveExpiredUserUpgrade()['expired'];
                break;
            case 'xs_uup_hauu' :
                if($repo->hasActiveUserUpgrade($user))
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_hnauu' :
                if(!$repo->hasActiveUserUpgrade($user))
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_huenxd':
                $value = $data['value_xs_uup_huenxd'];

                if($repo->hasExpireXNextDay($value, $user))
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_hlxeuu':
                $value = $data['value_xs_uup_hlxeuu'];
                $expired = $repo->hasUserExpire($user);
                if($expired >= $value)
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_hnmtxeuu':
                $value = $data['value_xs_uup_hnmtxeuu'];
                $expired = $repo->hasUserExpire($user);
                if($expired <= $value)
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_halxauuisp':
                $value = $data['value_xs_uup_halxauuisp'];
                $ids = $data['user_upgrade_id_halxauuisp'];
                if($repo->hasAtXUserUpgrade($ids, $user, 'XF:UserUpgradeActive') >= $value)
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_halxuuiosp':
                $value = $data['value_xs_uup_halxuuiosp'];
                $ids = $data['user_upgrade_id_halxuuiosp'];
                if($repo->hasAtXUserUpgrade($ids, $user) >= $value)
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_hpuaospp':
                $ids = $data['payment_xs_uup_hpuaospp'];
                $idProfilePayment = $repo->getProfilePaymentByUser($user, $ids);
                if(($idProfilePayment && in_array($idProfilePayment, (array)$ids)) || (!$idProfilePayment && array_search(0, $ids) !== false))
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
            case 'xs_uup_hpaotsuu':
                $value = $data['value_xs_uup_hpaotsuu'];
                $ids = $data['upgrade_xs_uup_hpaotsuu'];
                $idProfilePayment = $repo->hasUserUpgradeById($user, $ids);
                if($idProfilePayment &&
                    in_array($idProfilePayment, (array)$ids) &&
                    $repo->hasUserUpgradeByCount($user, $ids, $value)
                )
                {
                    $returnValue = true;
                }
                else
                {
                    $returnValue = false;
                }
                break;
		}
	}
}