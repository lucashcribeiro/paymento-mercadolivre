<?php
/*************************************************************************
 * XenForo Nodes Icon Tweak - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\NodesIconTweak\XF\Entity;

class Node extends XFCP_Node
{
    public function getDefaultNodesIconParams()
    {
        $this->xfa_nit_params = array(
            'fa_icon1' => array(
                'size'              => 32,
                'small_size'        => 14,
                'layer_down_color'  => '#000000',
                'layer_up_color'    => '#FFFFFF'
            ),
            'fa_icon2' => array(
                'size'              => 32,
                'small_size'        => 14,
                'layer_down_color'  => '#000000',
                'layer_up_color'    => '#FFFFFF'
            ),
            'srv_icon1' => array(
                'size'              => 32,
                'small_size'        => 14
            ),
            'srv_icon2' => array(
                'size'              => 32,
                'small_size'        => 14
            ),
            'sprite_icon1' => array(
                'size'              => 32
            ),
            'sprite_icon2' => array(
                'size'              => 32
            )
        );
    }

    public function isOldNodesIconForm()
    {
        if ($this->xfa_nit_params && isset($this->xfa_nit_params['xfa_nit_fa_icon1_size']))
        {
            return true;
        }

        return false;
    }

    public function convertFromOldToNewNodesIcon()
    {
        $this->xfa_nit_params = array(
            'fa_icon1' => array(
                'size'                  => $this->xfa_nit_params['xfa_nit_fa_icon1_size'],
                'small_size'            => $this->xfa_nit_params['xfa_nit_fa_icon1_small_size'],
                'layer_down'            => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_down'],
                'layer_down_color'      => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_down_color'],
                'layer_down_transform'  => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_down_transform'],
                'layer_down_animate'    => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_down_animate'],
                'layer_up'              => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_up'],
                'layer_up_color'        => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_up_color'],
                'layer_up_transform'    => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_up_transform'],
                'layer_up_animate'      => $this->xfa_nit_params['xfa_nit_fa_icon1_layer_up_animate']
            ),
            'fa_icon2' => array(
                'size'                  => $this->xfa_nit_params['xfa_nit_fa_icon2_size'],
                'small_size'            => $this->xfa_nit_params['xfa_nit_fa_icon2_small_size'],
                'layer_down'            => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_down'],
                'layer_down_color'      => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_down_color'],
                'layer_down_transform'  => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_down_transform'],
                'layer_down_animate'    => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_down_animate'],
                'layer_up'              => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_up'],
                'layer_up_color'        => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_up_color'],
                'layer_up_transform'    => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_up_transform'],
                'layer_up_animate'      => $this->xfa_nit_params['xfa_nit_fa_icon2_layer_up_animate']
            ),
            'srv_icon1' => array(
                'icon'                  => $this->xfa_nit_params['xfa_nit_srv_icon1'],
                'size'                  => $this->xfa_nit_params['xfa_nit_srv_icon1_size'],
                'small_icon'            => $this->xfa_nit_params['xfa_nit_srv_icon1_small'],
                'small_size'            => $this->xfa_nit_params['xfa_nit_srv_icon1_small_size']
            ),
            'srv_icon2' => array(
                'icon'                  => $this->xfa_nit_params['xfa_nit_srv_icon2'],
                'size'                  => $this->xfa_nit_params['xfa_nit_srv_icon2_size'],
                'small_icon'            => $this->xfa_nit_params['xfa_nit_srv_icon2_small'],
                'small_size'            => $this->xfa_nit_params['xfa_nit_srv_icon2_small_size']
            ),
            'sprite_icon1' => array(
                'icon'                  => $this->xfa_nit_params['xfa_nit_sprite_icon1'],
                'size'                  => $this->xfa_nit_params['xfa_nit_sprite_icon1_size'],
                'x'                     => $this->xfa_nit_params['xfa_nit_sprite_icon1_x'],
                'y'                     => $this->xfa_nit_params['xfa_nit_sprite_icon1_y']
            ),
            'sprite_icon2' => array(
                'icon'                  => $this->xfa_nit_params['xfa_nit_sprite_icon2'],
                'size'                  => $this->xfa_nit_params['xfa_nit_sprite_icon2_size'],
                'x'                     => $this->xfa_nit_params['xfa_nit_sprite_icon2_x'],
                'y'                     => $this->xfa_nit_params['xfa_nit_sprite_icon2_y']
            )
        );
    }

    protected function _postSave()
    {
        parent::_postSave();

        \XF::repository('XF:Style')->updateAllStylesLastModifiedDate();
    }
}