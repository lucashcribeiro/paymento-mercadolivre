<?php
/*************************************************************************
 * XenForo Nodes Icon Tweak - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\NodesIconTweak\XF\Admin\Controller;

class Page extends XFCP_Page
{
    protected function nodeAddEdit(\XF\Entity\Node $node)
    {
        $reply = parent::nodeAddEdit($node);

        \XFA\NodesIconTweak\Help\NodeEdit::nodeAddEdit($node, $reply, false);

        return $reply;
    }

    protected function nodeSaveProcess(\XF\Entity\Node $node)
    {
        $form = parent::nodeSaveProcess($node);

        \XFA\NodesIconTweak\Help\NodeEdit::nodeSaveProcess($this, $node, $form);

        return $form;
    }
}