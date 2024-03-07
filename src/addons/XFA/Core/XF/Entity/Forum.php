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

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class Forum extends XFCP_Forum
{
    /* Add Last Poster as default with */
    public static function getListedWith()
    {
        $with = parent::getListedWith();

        $with[] = 'LastPoster';

        return $with;
    }

    /* Add Last Poster to the extras */
    public function getNodeListExtras()
    {
        $output = parent::getNodeListExtras();

        if (\XF::visitor()->hasNodePermission($this->node_id, 'viewOthers'))
        {
            if ($this->last_post_date)
            {
                $output['LastPoster'] = $this->LastPoster;
            }
        }

        return $output;
    }

    /* Add Last Poster relation */
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->relations['LastPoster'] = [
            'entity'        => 'XF:User',
            'type'          => Entity::TO_ONE,
            'conditions'    => [['user_id', '=', '$last_post_user_id']],
            'primary'       => true
        ];

        return $structure;
    }
}