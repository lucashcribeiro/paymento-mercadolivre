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

class Node extends XFCP_Node
{
    public function actionIndex()
    {
        $reply = parent::actionIndex();

        if ($reply instanceof \XF\Mvc\Reply\View)
        {
            if (\XF::fs()->has('data://xfa/nodesicontweak/icons'))
            {
                $reply->setParam('iconsUrl', \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons');
            }

            if (\XF::options()->xfa_nit_separateSrvIcons && \XF::fs()->has('data://xfa/nodesicontweak/icons-small'))
            {
                $reply->setParam('smallIconsUrl', \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons-small');
            }
            else if (\XF::fs()->has('data://xfa/nodesicontweak/icons'))
            {
                $reply->setParam('smallIconsUrl', \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons');
            }
        }

        return $reply;
    }
}