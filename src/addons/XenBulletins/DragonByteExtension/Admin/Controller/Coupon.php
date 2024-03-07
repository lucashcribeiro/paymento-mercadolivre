<?php

namespace XenBulletins\DragonByteExtension\Admin\Controller;

use XF\Mvc\ParameterBag;

class Coupon extends XFCP_Coupon {

    public function actionbulkAdd() {


                $coupon = $this->em()->create('DBTech\UserUpgradeCoupon:Coupon');

                $upgradeRepo = $this->getUserUpgradeRepo();
                if (!$upgradeRepo->findUserUpgradesForList()->total()) {
                    throw $this->exception($this->error(\XF::phrase('dbtech_user_upgrade_please_create_at_least_one_upgrade_before_continuing')));
                }
                $upgradeRepo = $this->getUserUpgradeRepo();

                $viewParams = [
                    'coupon' => $coupon,
                    'userUpgrades' => $upgradeRepo->findUserUpgradesForList()->fetch(),
                    'nextCounter' => count($coupon->user_upgrade_discounts),
                ];

                return $this->view('XenBulletins\DragonByteExtension:Coupon\Add', 'dbtech_user_upgrade_bulk_coupon', $viewParams);
    }

    public function actionbulkSave() {


                $bulkInput = $this->filter([
                    'coupon_code' => 'str',
                    'coupon_type' => 'str',
                    'coupon_percent' => 'float',
                    'coupon_value' => 'float',
                    'remaining_uses' => 'int',
                ]);




                $couponCodes = explode("\n", $bulkInput['coupon_code']);

                foreach ($couponCodes as $code) {

                    $creator = $this->service('DBTech\UserUpgradeCoupon:Coupon\Create');
                    $bulkInput['coupon_code'] = $code;

                    $creator->getCoupon()->bulkSet($bulkInput);

                    $creator->setTitle($this->filter('title', 'str'));

                    $dateInput = $this->filter([
                        'start_date' => 'datetime',
                        'start_time' => 'str'
                    ]);
                    $creator->setStartDate($dateInput['start_date'], $dateInput['start_time']);

                    $dateInput = $this->filter([
                        'length_amount' => 'uint',
                        'length_unit' => 'str',
                    ]);
                    $creator->setDuration($dateInput['length_amount'], $dateInput['length_unit']);

                    $discounts = [];
                    $args = $this->filter('user_upgrade_discounts', 'array');
                    foreach ($args AS $arg) {
                        if (empty($arg['user_upgrade_id'])) {
                            continue;
                        }
                        $discounts[] = $this->filterArray($arg, [
                            'user_upgrade_id' => 'uint',
                            'upgrade_value' => 'float',
                        ]);
                    }

                    $creator->setUpgradeDiscounts($discounts);

                    $coupon = $creator->save();
                    $this->finalizeCouponCreate($creator);
                }

        


        return $this->redirect($this->buildLink('dbtech-upgrades/coupons'));
    }

}
