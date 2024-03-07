<?php

namespace cv6\NodeIcon\XF\Entity;

class Node extends XFCP_Node
{

    const
        CV6_ICON_FA = 1,
        CV6_ICON_IMG = 2,
        CV6_ICON_SVG = 3;

    public function getNodeIconTypes()
    {
        $types = [
            self::CV6_ICON_FA => [
                'label' => \XF::phrase('cv6_fa_icon'),
                'hint' => \XF::phrase('cv6_faicon_hint')
            ],
            self::CV6_ICON_IMG => [
                'label' => \XF::phrase('cv6_iconimage'),
                'hint' => \XF::phrase('cv6_iconimage_hint')
            ]
        ];

        if (\XF::options()->cv6NodeIconSvgInline)
        {
            $types[self::CV6_ICON_SVG] = [
                'label' => \XF::phrase('cv6_iconsvg'),
                'hint' => \XF::phrase('cv6_iconsvg_hint')
            ];
        }

        return $types;
    }
    
    public function getNodeIcon()
    {
        if ($this->cv6_icon_type == self::CV6_ICON_FA AND !empty($this->cv6_icon))
        {
            return $this->cv6_icon;
        }
        return false;
    }

    public function getNodeImage()
    {
        if ( ( $this->cv6_icon_type == self::CV6_ICON_IMG OR $this->cv6_icon_type == self::CV6_ICON_SVG)
                    AND $this->cv6_image_path
             )
        {
            $pather = \XF::app()['request.pather'];
            $iconPath = htmlspecialchars($pather ? $pather($this->cv6_image_path, 'base') : $this->cv6_image_path);       
            return $iconPath;     
        }
        return false;
    }


}
