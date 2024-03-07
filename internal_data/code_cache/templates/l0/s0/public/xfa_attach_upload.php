<?php
// FROM HASH: b814e650759973b02acf9dba09cc38f9
return array(
'macros' => array('uploaded_files_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'attachments' => array(),
		'listClass' => '',
		'displayOrder' => '',
		'url' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->includeCss('attachments.less');
	$__finalCompiled .= '
	<ul class="attachUploadList ' . $__templater->escape($__vars['listClass']) . ' js-attachmentFiles u-hidden ' . (!$__templater->test($__vars['attachments'], 'empty', array()) ? 'is-active' : '') . '">
		<li class="attachUploadList-insertAll js-attachmentInsertAllRow u-hidden">
			<span>' . 'Insert all' . $__vars['xf']['language']['label_separator'] . '</span>
			<span class="buttonGroup buttonGroup--aligned">
				' . $__templater->button('
					' . 'Thumbnail' . '
				', array(
		'class' => 'button--small js-attachmentAllAction',
		'data-action' => 'thumbnail',
	), '', array(
	)) . '
				' . $__templater->button('
					' . 'Full image' . '
				', array(
		'class' => 'button--small js-attachmentAllAction',
		'data-action' => 'full',
	), '', array(
	)) . '
			</span>
		</li>
	';
	if ($__templater->isTraversable($__vars['attachments'])) {
		foreach ($__vars['attachments'] AS $__vars['attachment']) {
			$__finalCompiled .= '
		' . $__templater->callMacro(null, 'uploaded_file', array(
				'attachment' => $__vars['attachment'],
				'displayOrder' => $__vars['displayOrder'],
				'url' => $__vars['url'],
			), $__vars) . '
	';
		}
	}
	$__finalCompiled .= '
	</ul>
	' . $__templater->callMacro(null, 'uploaded_file_template', array(), $__vars) . '
';
	return $__finalCompiled;
}
),
'uploaded_file' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'attachment' => '!',
		'noJsFallback' => false,
		'displayOrder' => '',
		'url' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<li class="js-attachmentFile" data-attachment-id="' . $__templater->escape($__vars['attachment']['attachment_id']) . '">
		<div class="contentRow">
			<span class="contentRow-figure attachUploadList-figure">
				';
	if ($__vars['attachment']['has_thumbnail']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank"><img src="' . $__templater->func('base_url', array($__vars['attachment']['thumbnail_url'], ), true) . '" class="js-attachmentThumb" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" /></a>
				';
	} else {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank"><i class="attachUploadList-placeholder" aria-hidden="true"></i></a>
				';
	}
	$__finalCompiled .= '
			</span>
	
			<div class="contentRow-main">
				';
	if ($__vars['noJsFallback']) {
		$__finalCompiled .= '
					<span class="contentRow-extra">
						' . $__templater->button('
							' . 'Delete' . '
						', array(
			'type' => 'submit',
			'class' => 'button--small',
			'name' => 'delete',
			'value' => $__vars['attachment']['attachment_id'],
		), '', array(
		)) . '
					</span>
				';
	} else {
		$__finalCompiled .= '
					<span class="contentRow-extra u-jsOnly">
						' . $__templater->button('
							' . 'Delete' . '
						', array(
			'class' => 'button--small js-attachmentAction',
			'data-action' => 'delete',
		), '', array(
		)) . '
					</span>
				';
	}
	$__finalCompiled .= '
				<div class="contentRow-title">
					<a href="' . $__templater->func('link', array('attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" class="js-attachmentView" target="_blank">' . $__templater->escape($__vars['attachment']['filename']) . '</a>
				</div>

				';
	if ($__vars['displayOrder']) {
		$__finalCompiled .= '
					' . $__templater->formTextBoxRow(array(
			'name' => 'displayOrder[' . $__vars['attachment']['data_id'] . ']',
			'value' => $__vars['attachment']['displayOrder'],
			'type' => 'number',
		), array(
			'explain' => 'xfa_core_display_order_explain',
			'label' => 'xfa_core_display_order',
		)) . '
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['url']) {
		$__finalCompiled .= '
					' . $__templater->formTextBoxRow(array(
			'name' => 'targetUrl[' . $__vars['attachment']['data_id'] . ']',
			'value' => $__vars['attachment']['targetUrl'],
			'type' => 'text',
		), array(
			'explain' => 'xfa_core_url_explain',
			'label' => 'xfa_core_url',
		)) . '
				';
	}
	$__finalCompiled .= '
				
				';
	if ($__vars['attachment']['has_thumbnail'] AND (!$__vars['noJsFallback'])) {
		$__finalCompiled .= '
					<div class="contentRow-spaced contentRow-minor attachUploadList-insertRow js-attachmentInsertRow">
						<span>' . 'Insert' . $__vars['xf']['language']['label_separator'] . '</span>
						<span class="buttonGroup buttonGroup--aligned">
							' . $__templater->button('
								' . 'Thumbnail' . '
							', array(
			'class' => 'button--small js-attachmentAction',
			'data-action' => 'thumbnail',
		), '', array(
		)) . '
							' . $__templater->button('
								' . 'Full image' . '
							', array(
			'class' => 'button--small js-attachmentAction',
			'data-action' => 'full',
		), '', array(
		)) . '
						</span>
					</div>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</li>
';
	return $__finalCompiled;
}
),
'uploaded_file_template' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<script type="text/template" class="js-attachmentUploadTemplate">
		<li class="js-attachmentFile" ' . $__templater->func('mustache', array('#attachment_id', 'data-attachment-id="{{attachment_id}}"', ), true) . '>
			<div class="contentRow">
				<span class="contentRow-figure attachUploadList-figure">
					' . $__templater->func('mustache', array('#thumbnail_url', '
						<a href="' . $__templater->func('mustache', array('link', ), true) . '" target="_blank"><img src="' . $__templater->func('mustache', array('thumbnail_url', ), true) . '" class="js-attachmentThumb" alt="' . $__templater->func('mustache', array('filename', ), true) . '" /></a>
					')) . '
					' . $__templater->func('mustache', array('^thumbnail_url', '
						<i class="attachUploadList-placeholder" aria-hidden="true"></i>
					')) . '
				</span>
				<div class="contentRow-main">
					<span class="contentRow-extra u-jsOnly">
						' . $__templater->func('mustache', array('^uploading', '
							' . $__templater->button('
								' . 'Delete' . '
							', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'delete',
	), '', array(
	)) . '
						')) . '
						' . $__templater->func('mustache', array('#uploading', '
							' . $__templater->button('
								' . 'Cancel' . '
							', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'cancel',
	), '', array(
	)) . '
						')) . '
					</span>
					<div class="contentRow-title">
						' . $__templater->func('mustache', array('#link', '
							<a href="' . $__templater->func('mustache', array('link', ), true) . '" class="js-attachmentView" target="_blank">' . $__templater->func('mustache', array('filename', ), true) . '</a>
						')) . '
						' . $__templater->func('mustache', array('^link', '
							<span>' . $__templater->func('mustache', array('filename', ), true) . '</span>
						')) . '
					</div>

					' . $__templater->func('mustache', array('#uploading', '
						<div class="contentRow-spaced">
							<div class="attachUploadList-progress js-attachmentProgress"></div>
							<div class="attachUploadList-error js-attachmentError"></div>
						</div>
					')) . '

					' . $__templater->func('mustache', array('^uploading', '
						' . $__templater->func('mustache', array('#thumbnail_url', '
							<div class="contentRow-spaced attachUploadList-insertRow js-attachmentInsertRow">
								<span>' . 'Insert' . $__vars['xf']['language']['label_separator'] . '</span>
								<span class="buttonGroup buttonGroup--aligned">
									' . $__templater->button('
										' . 'Thumbnail' . '
									', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'thumbnail',
	), '', array(
	)) . '
									' . $__templater->button('
										' . 'Full image' . '
									', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'full',
	), '', array(
	)) . '
								</span>
							</div>
						')) . '
					')) . '
				</div>
			</div>
		</li>
	</script>
';
	return $__finalCompiled;
}
),
'upload_block' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'attachmentData' => '!',
		'forceHash' => '',
		'hiddenName' => 'attachment_hash',
		'displayOrder' => '',
		'url' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->callMacro(null, 'uploaded_files_list', array(
		'attachments' => $__vars['attachmentData']['attachments'],
		'displayOrder' => $__vars['displayOrder'],
		'url' => $__vars['url'],
	), $__vars) . '

	' . $__templater->callMacro('helper_attach_upload', 'upload_link_from_data', array(
		'attachmentData' => $__vars['attachmentData'],
		'forceHash' => $__vars['forceHash'],
		'hiddenName' => $__vars['hiddenName'],
	), $__vars) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

';
	return $__finalCompiled;
}
);