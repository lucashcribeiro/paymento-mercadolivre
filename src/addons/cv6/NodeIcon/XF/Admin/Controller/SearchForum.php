<?php

namespace cv6\NodeIcon\XF\Admin\Controller;

use XF\Mvc\FormAction;

class SearchForum extends XFCP_SearchForum
{

    protected function nodeSaveProcess(\XF\Entity\Node $node)
    {
        $iconData = $this->filter(
            ['node' => [
                'cv6_icon_type' => 'int',
                'cv6_icon' => 'str',
                'cv6_image_path' => 'str'
            ]]
        );
        $formAction = parent::nodeSaveProcess($node);
        $formAction->setup(function () use ($node, $iconData) {
            $node->cv6_icon_type = $iconData['node']['cv6_icon_type'];
            $node->cv6_icon = $iconData['node']['cv6_icon'];
            $node->cv6_image_path = $iconData['node']['cv6_image_path'];
        });
        return $formAction;
    }
}