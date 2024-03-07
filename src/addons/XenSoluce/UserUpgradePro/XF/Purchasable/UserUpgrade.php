<?php

namespace XenSoluce\UserUpgradePro\XF\Purchasable;

use XF\Payment\CallbackState;

class UserUpgrade extends XFCP_UserUpgrade
{
    public function completePurchase(CallbackState $state)
    {
        if ($state->legacy)
        {
            $purchaseRequest = null;
        }
        else
        {
            $purchaseRequest = $state->getPurchaseRequest();
        }

        $paymentResult = $state->paymentResult;
        if($paymentResult === CallbackState::PAYMENT_RECEIVED && !\XF::options()->xs_uup_count_manual_upgrades)
        {
            $user = \XF::em()->getFinder('XF:User')->where('user_id',$purchaseRequest->user_id)->fetchOne();
            $user->xs_uup_count_upgrade += 1;
            $user->save();
        }

        parent::completePurchase($state);
    }
}