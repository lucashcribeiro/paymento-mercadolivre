<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\Option;

use XF\Option\AbstractOption;

class Category extends AbstractOption
{
	public static function renderSelect(\XF\Entity\Option $option, array $htmlParams)
	{
		$data = self::getSelectData($option, $htmlParams);

		return self::getTemplater()->formSelectRow(
			$data['controlOptions'], $data['choices'], $data['rowOptions']
		);
	}

	public static function renderSelectMultiple(\XF\Entity\Option $option, array $htmlParams)
	{
		$data = self::getSelectData($option, $htmlParams);
		$data['controlOptions']['multiple'] = true;
		$data['controlOptions']['size'] = 8;

		return self::getTemplater()->formSelectRow(
			$data['controlOptions'], $data['choices'], $data['rowOptions']
		);
	}

	protected static function getSelectData(\XF\Entity\Option $option, array $htmlParams)
	{
		/** @var \XF\Repository\Node $nodeRepo */
		$nodeRepo = \XF::repository('XF:Node');

		$choices = $nodeRepo->getNodeOptionsData(true, 'Category', 'option');
		$choices = array_map(function($v) {
			$v['label'] = \XF::escapeString($v['label']);
			return $v;
		}, $choices);

		return [
			'choices' => $choices,
			'controlOptions' => self::getControlOptions($option, $htmlParams),
			'rowOptions' => self::getRowOptions($option, $htmlParams)
		];
	}
}