<?php
/*************************************************************************
 * XenForo RM Marketplace - Xen Factory (c) 2015-2018
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\NodesIconTweak\Job\Upgrade;

use XF\Db\Schema\Alter;
use XF\Job\AbstractRebuildJob;

class Node903000590 extends AbstractRebuildJob
{
    protected function getNextIds($start, $batch)
    {
        $db = $this->app->db();

        return $db->fetchAllColumn($db->limit(
            "
				SELECT node_id
				FROM xf_node
				WHERE node_id > ?
				ORDER BY node_id
			", $batch
        ), $start);
    }

    protected function rebuildById($id)
    {
        // Get Node
        $node = \XF::finder('XF:Node')->whereId($id)->fetchOne();

        // If node is old format, change to new
        if ($node->isOldNodesIconForm())
        {
            $node->convertFromOldToNewNodesIcon();
            $node->save();
        }
    }

    protected function getStatusType()
    {
        return \XF::phrase('xfa_nit_rebuilding_nodes');
    }
}