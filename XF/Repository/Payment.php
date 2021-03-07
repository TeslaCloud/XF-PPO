<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\PPO\XF\Repository;

class Payment extends XFCP_Payment
{
    public function findPaymentProfilesForList() : \XF\Mvc\Entity\Finder
    {
        $finder = parent::findPaymentProfilesForList();
        $finder->resetOrder();
        $finder->setDefaultOrder('display_order');

        return $finder;
    }
}