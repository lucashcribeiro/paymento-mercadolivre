<?php
/*************************************************************************
* XenForo Nodes Icon Tweak - Xen Factory (c) 2017
* All Rights Reserved.
* Created by Clement Letonnelier aka. MtoR
*************************************************************************
* This file is subject to the terms and conditions defined in the Licence
* Agreement available at http://xen-factory.com/pages/license-agreement/.
*************************************************************************/

namespace XFA\NodesIconTweak;

use XF\Mvc\Entity\Entity;

class Listener
{
    public static function nodeEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        $structure->columns['xfa_nit_type']     = ['type' => Entity::UINT, 'default' => 0];
        $structure->columns['xfa_nit_params']   = ['type' => Entity::SERIALIZED_ARRAY,  'default' => ''];
    }

    public static function templaterTemplatePostRender(\XF\Template\Templater $templater, $type, $template, &$output)
    {
        if ($template == 'node_list.less')
        {
            $nodes = \XF::app()->em()->getRepository('XF:Node')->getFullNodeList();

            $data = [
                'nodes' => $nodes
            ];

            if (\XF::fs()->has('data://xfa/nodesicontweak/icons'))
            {
                $data['iconsUrl'] = \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons';
            }

            if (\XF::options()->xfa_nit_separateSrvIcons && \XF::fs()->has('data://xfa/nodesicontweak/icons-small'))
            {
                $data['smallIconsUrl'] = \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons-small';
            }
            else if (\XF::fs()->has('data://xfa/nodesicontweak/icons'))
            {
                $data['smallIconsUrl'] = \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons';
            }

            $output .= \XF::app()->templater()->renderTemplate('public:xfa_nit_node_list.less', $data);
        }
    }
}