<?php

namespace cv6\NodeIcon\XF\Admin\Controller;

class Asset extends XFCP_Asset
{
	protected function getAssetPermissionMap(): array
	{
		// asset type => admin permission
		return array_merge([
			'nodeicons' => 'style',
		], parent::getAssetPermissionMap());
	}
}
