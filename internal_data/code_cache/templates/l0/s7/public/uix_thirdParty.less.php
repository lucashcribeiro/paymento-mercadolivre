<?php
// FROM HASH: aa4216ea8bffa3f4183d6945b4fef190
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// Featured Threads

.message.thfeature {
	.message-body {padding: 0;}	
	.message-attribution {margin-bottom: 0;}	
	
	.message-footer {padding-top: @xf-messagePadding;}
}

// Nodes

';
	if ($__templater->func('property', array('th_enableGrid_nodes', ), false)) {
		$__finalCompiled .= '

.node + .node {border: none;}

.thNodes__nodeList.block .block-container .th_nodes--below-lg .node-extra {padding-top: 0;}

.thNodes__nodeList.block .block-container .node-body {
	border: none;
	box-shadow: @xf-uix_elevation1;

	.th_node--hasBackground& {
		&:hover {
			.xf-uix_nodeBodyHover();
		}		
	}
}

';
	}
	$__finalCompiled .= '

// XenPorta

.porta-article-item .block-body.message-inner {display: flex;}

.porta-articles-above-full {margin-bottom: @xf-elementSpacer;}

// resource manager

.resourceBody .actionBar {
	padding: 0;
	margin: 0;
}

.resourceBody-main .bbWrapper {
	margin-bottom: @xf-messagePadding;
}

// XFMG

.xfmgInfoBlock .actionBar .actionBar-set {
	margin-top: 0;
}

// post comments

.block--messages .message .thpostcomments_commentsContainer .message {

	.message-actionBar {
		padding-top: 0;
		border-top: 0;
	}

	.message-attribution {
		padding-top: 0;
		padding-bottom: @xf-paddingSmall;
	}
}

// achivements

.memberHeader-actionTop .profile-achievement-showcase {
	@media (max-width: @xf-responsiveMedium) {
		margin: 0;
	}
}';
	return $__finalCompiled;
}
);