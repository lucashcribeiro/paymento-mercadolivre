<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\XF\Repository;

class Node extends XFCP_Node
{
    /* Ensure Last Poster get raised from childs */
    public function mergeNodeListExtras(array $extras, array $childExtras)
    {
        $output = parent::mergeNodeListExtras($extras, $childExtras);

        $coreOutput = array_merge([
            'last_post_date'    => 0,
            'LastPoster'        => null
        ], $extras);

        foreach ($childExtras AS $child)
        {
            if (!empty($child['last_post_date']) && $child['last_post_date'] > $coreOutput['last_post_date'])
            {
                $coreOutput['last_post_date']    = $child['last_post_date'];
                $coreOutput['LastPoster']        = $child['LastPoster'];
            }
        }

        $output['LastPoster'] = $coreOutput['LastPoster'];

        return $output;
    }
}