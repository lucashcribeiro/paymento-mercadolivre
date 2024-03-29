<?php
// FROM HASH: 6c371d6757015574346c17f86424a1ba
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('uix_socialMedia.less');
	$__finalCompiled .= '
';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_facebookUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Facebook" data-xf-init="tooltip" title="' . 'Facebook' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_facebookUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-facebook', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_deviantArtUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Deviant Art" data-xf-init="tooltip" title="' . 'uix_deviantArt' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_deviantArtUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-deviantart', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_discordUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Discord" data-xf-init="tooltip" title="' . 'option.th_discordUrl_uix' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_discordUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-discord', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_flickrUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Flickr" data-xf-init="tooltip" title="' . 'option.uix_flickr' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_flickrUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-flickr', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_gitHubUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="GitHub" data-xf-init="tooltip" title="' . 'uix_github' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_gitHubUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-github-alt', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if (($__vars['xf']['versionId'] >= 2010010) AND $__vars['xf']['options']['th_googlePlus_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Google Plus" data-xf-init="tooltip" title="' . 'Google+' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_googlePlus_uix']) . '">
					' . $__templater->fontAwesome('fa-google-plus-g', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_instagramUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Instagram" data-xf-init="tooltip" title="' . 'uix_instagram' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_instagramUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-instagram', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_linkedInUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="LinkedIn" data-xf-init="tooltip" title="' . 'uix_linkedin' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_linkedInUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-linkedin', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_pinterestUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Pinterest" data-xf-init="tooltip" title="' . 'Pinterest' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_pinterestUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-pinterest', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_redditUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Reddit" data-xf-init="tooltip" title="' . 'Reddit' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_redditUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-reddit', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_steamUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Steam" data-xf-init="tooltip" title="' . 'uix_steam' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_steamUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-steam', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			' . '
			';
	if ($__vars['xf']['options']['th_twitchUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Twitch" data-xf-init="tooltip" title="' . 'uix_twitch' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_twitchUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-twitch', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_twitterUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="Twitter" data-xf-init="tooltip" title="' . 'Twitter' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_twitterUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-twitter', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['xf']['options']['th_youtubeUrl_uix']) {
		$__compilerTemp1 .= '
				<li><a aria-label="YouTube" data-xf-init="tooltip" title="' . 'uix_youtube' . '" target="_blank" href="' . $__templater->escape($__vars['xf']['options']['th_youtubeUrl_uix']) . '">
					' . $__templater->fontAwesome('fa-youtube', array(
			'class' => 'fab',
		)) . '
					</a></li>
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
	<ul class="uix_socialMedia">
		' . $__compilerTemp1 . '
	</ul>
';
	}
	return $__finalCompiled;
}
);