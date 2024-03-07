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

class Attachment extends XFCP_Attachment
{
    /**
     * @return mixed|null
     */
    public function getDisplayOrder()
    {
        return $this->Data ? $this->Data->xfa_do : '';
    }

    /**
     * @return mixed|null
     */
    public function getTargetUrl()
    {
        return $this->Data ? $this->Data->xfa_url : '';
    }

    /**
     * @param Structure $structure
     * @return Structure
     */
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);
        $structure->getters['displayOrder'] = ['getter' => 'getDisplayOrder', 'cache' => false];
        $structure->getters['targetUrl'] = ['getter' => 'getTargetUrl', 'cache' => false];
        return $structure;
    }
}
