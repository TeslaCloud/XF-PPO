<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\PPO\XF\Admin\Controller;

class PaymentProfile extends XFCP_PaymentProfile
{
    /**
     * @return \XF\Mvc\Reply\Redirect|\XF\Mvc\Reply\View
     */
    public function actionSort()
    {
        $paymentProfileRepo = $this->getPaymentRepo();

        $paymentProfileFinder = $paymentProfileRepo->findPaymentProfilesForList();
        $paymentProfiles = $paymentProfileFinder->fetch();

        if ($this->isPost())
        {
            $sortData = $this->filter('paymentProfiles', 'json-array');

            /** @var \XF\ControllerPlugin\Sort $sorter */
            $sorter = $this->plugin('XF:Sort');
            $sorter->sortFlat($sortData, $paymentProfiles);

            return $this->redirect($this->buildLink('payment-profiles'));
        }
        else
        {
            return $this->view('XF:PaymentProfile\PaymentProfileSort', 'tc_ppo_payment_profile_sort', [
                'paymentProfiles' => $paymentProfiles
            ]);
        }
    }

    /**
     * @param \XF\Entity\PaymentProfile $profile
     * @param \XF\Entity\PaymentProvider $provider
     * @return \XF\Mvc\FormAction
     */
    protected function profileSaveProcess(\XF\Entity\PaymentProfile $profile, \XF\Entity\PaymentProvider $provider)
    {
        $input = $this->filter([
            'display_order' => 'uint'
        ]);

        $form = parent::profileSaveProcess($profile, $provider);
        $form->basicEntitySave($profile, $input);

        return $form;
    }
}