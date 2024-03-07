<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\XF\Entity;

use XF\Mvc\Entity\Structure;

class AttachmentData extends XFCP_AttachmentData
{
    /**
     * @param Structure $structure
     * @return Structure
     */
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);
        $structure->columns['xfa_do'] = ['type' => self::UINT, 'default' => 0];
        $structure->columns['xfa_url'] = ['type' => self::STR, 'default' => ''];
        return $structure;
    }
}
