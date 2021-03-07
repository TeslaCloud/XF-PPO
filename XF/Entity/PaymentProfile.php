<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\PPO\XF\Entity;

use XF\Mvc\Entity\Structure;

class PaymentProfile extends XFCP_PaymentProfile
{
    /**
     * @param Structure $structure
     */
    public static function getStructure(Structure $structure) : Structure
    {
        $structure = parent::getStructure($structure);
        $structure->columns['display_order'] = ['type' => self::UINT, 'default' => 0];

        return $structure;
    }
}