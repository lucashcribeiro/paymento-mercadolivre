<?php

namespace cv6\NodeIcon;

use XF\Mvc\Entity\Entity;


class Listener
{
    public static function nodeEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        $structure->columns['cv6_icon'] = ['type' => Entity::STR, 'default' => NULL, 'nullable' => true];
        $structure->columns['cv6_icon_type'] = ['type' => Entity::INT, 'default' => 0, 'nullable' => true];
        $structure->columns['cv6_image_path'] = ['type' => Entity::STR, 'default' => NULL, 'nullable' => true];
    }

    public static function categoryEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        $structure->columns['cv6_can_collapsed'] = ['type' => Entity::BOOL, 'default' => false];
    }

}