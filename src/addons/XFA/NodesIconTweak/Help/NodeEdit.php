<?php
/*************************************************************************
 * XenForo Nodes Icon Tweak - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\NodesIconTweak\Help;

class NodeEdit
{
    public static function  nodeAddEdit(\XF\Entity\Node $node, &$reply, $showSecondIcon)
    {
        if ($reply instanceof \XF\Mvc\Reply\View)
        {
            if (!$node->xfa_nit_params)
            {
                $node->getDefaultNodesIconParams();
            }

            if ($node->isOldNodesIconForm())
            {
                $node->convertFromOldToNewNodesIcon();
            }

            /* Get server icons if any */
            $serverIconsData = array();
            if (\XF::fs()->has('data://xfa/nodesicontweak/icons'))
            {
                $iconsDir       = \XF\Util\File::canonicalizePath(\XF::app()->config('externalDataPath') . '/xfa/nodesicontweak/icons');
                $iconsDirFiles  = scandir($iconsDir);
                $iconsArr       = array_diff($iconsDirFiles, array('.','..','index.html'));

                $serverIconsData['icons_url']   = \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons';
                $serverIconsData['icons']       = $iconsArr;
            }

            /* Get server small icons if any/needed */
            if (\XF::options()->xfa_nit_separateSrvIcons && \XF::fs()->has('data://xfa/nodesicontweak/icons-small'))
            {
                $smallIconsDir       = \XF\Util\File::canonicalizePath(\XF::app()->config('externalDataPath') . '/xfa/nodesicontweak/icons');
                $smallIconsDirFiles  = scandir($smallIconsDir);
                $smallIconsArr       = array_diff($smallIconsDirFiles, array('.','..','index.html'));


                $serverIconsData['small_icons_url'] = \XF::app()->config('externalDataUrl') . '/xfa/nodesicontweak/icons-small';
                $serverIconsData['small_icons']     = $smallIconsArr;
            }
            else
            {
                $serverIconsData['small_icons_like_normal'] = 1;
            }

            $reply->setParam('serverIconsData', $serverIconsData);
            $reply->setParam('showSecondIcon', $showSecondIcon);
        }
    }

    public static function nodeSaveProcess(\XF\Admin\Controller\AbstractController $controller, \XF\Entity\Node $node, \XF\Mvc\FormAction &$form)
    {
        $xfaNitType     = $controller->filter('xfa_nit_type', 'uint');

        $xfaNitParams   = $controller->filter([
            'fa_icon1'      => array(
                'size'                  => 'uint',
                'small_size'            => 'uint',
                'layer_down'            => 'str',
                'layer_down_color'      => 'str',
                'layer_down_transform'  => 'str',
                'layer_down_animate'    => 'str',
                'layer_up'              => 'str',
                'layer_up_color'        => 'str',
                'layer_up_transform'    => 'str',
                'layer_up_animate'      => 'str',
            ),
            'fa_icon2'      => array(
                'size'                  => 'uint',
                'small_size'            => 'uint',
                'layer_down'            => 'str',
                'layer_down_color'      => 'str',
                'layer_down_transform'  => 'str',
                'layer_down_animate'    => 'str',
                'layer_up'              => 'str',
                'layer_up_color'        => 'str',
                'layer_up_transform'    => 'str',
                'layer_up_animate'      => 'str',
            ),
            'srv_icon1'     => array(
                'size'                  => 'uint',
                'small_size'            => 'uint',
                'icon'                  => 'str',
                'small_icon'            => 'str'
            ),
            'srv_icon2'     => array(
                'size'                  => 'uint',
                'small_size'            => 'uint',
                'icon'                  => 'str',
                'small_icon'            => 'str'
            ),
            'sprite_icon1'  => array(
                'size'                  => 'uint',
                'scaling'               => 'bool',
                'scaling_img_width'     => 'uint',
                'scaling_sprite_width'  => 'uint',
                'x'                     => 'uint',
                'y'                     => 'uint',
                'icon'                  => 'str'
            ),
            'sprite_icon2'  => array(
                'size'                  => 'uint',
                'scaling'               => 'bool',
                'scaling_img_width'     => 'uint',
                'scaling_sprite_width'  => 'uint',
                'x'                     => 'uint',
                'y'                     => 'uint',
                'icon'                  => 'str'
            ),
        ]);

        $form->setup(function() use ($node, $xfaNitType, $xfaNitParams)
        {
            $node->xfa_nit_type     = $xfaNitType;
            $node->xfa_nit_params   = $xfaNitParams;
        });
    }
}