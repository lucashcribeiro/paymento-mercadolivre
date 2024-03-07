<?php

namespace cv6\NodeIcon\XF\Admin\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

class Category extends XFCP_Category
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

    protected function saveTypeData(FormAction $form, \XF\Entity\Node $node, \XF\Entity\AbstractNode $data)
    {
        /** @var \XF\Entity\Page $data */

        $pageInput = $this->filter([
            'cv6_can_collapsed' => 'bool'
        ]);

        $data->bulkSet($pageInput);

        // $template = $data->getMasterTemplate();
        // $templateInput = $this->filter('template', 'str');
        // $form->validate(function (FormAction $form) use ($templateInput, $template) {
        //     if (!$template->set('template', $templateInput)) {
        //         $form->logErrors($template->getErrors());
        //     }
        // });
        // $form->apply(function () use ($template) {
        //     if ($template) {
        //         $template->save();
        //     }
        // });
    }

}