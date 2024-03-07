<?php
// FROM HASH: 8a8dd4bca4c0b33ea779958a1dc6b80b
return array(
'macros' => array('welcomeSection' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'location' => '!',
		'showWelcomeSection' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['showWelcomeSection']) {
		$__finalCompiled .= '
		';
		if ($__vars['location'] == $__templater->func('property', array('uix_welcomeSectionLocation', ), false)) {
			$__finalCompiled .= '
			';
			$__templater->includeCss('uix_welcomeSection.less');
			$__finalCompiled .= '

			<div class="uix_welcomeSection">
				';
			$__templater->inlineJs('
					function initParticles() {
						motes(".gift_snowBox", "gift_snowflake1", 8, 12);
						motes(".gift_snowBox", "gift_snowflake2", 12, 14);
						motes(".gift_snowBox", "gift_snowflake3", 16, 17);
					}
				
					function motes(el, particle, moteCount, sizeDiv) {
						$.each($(el), function() {
							for(var i = 0; i <= moteCount; i++) {
								var size = ($.rnd(40,80)/sizeDiv);
								$(this).append(\'<div class="\' + particle 
									+ \'" style="top: -10\' //+ $.rnd(5,20) 
									+ \'px; left:\' + $.rnd(0,99) 
									+ \'%; width:\' + size 
									+ \'px; height:\' + size 
									+ \'px; animation-delay: \' + ($.rnd(0,70)/10) 
									+ \'s;" aria-hidden="true"></div>\');
							}
						});
					}
				
					jQuery.rnd = function(m,n) {
						m = parseInt(m);
						n = parseInt(n);
						return Math.floor( Math.random() * (n - m + 1) ) + m;
					}
				
					initParticles();
				');
			$__finalCompiled .= '
				<div class="gift_snowBox"></div>
				<div class="uix_welcomeSection__inner">

					<div class="media__container">

						';
			if ($__templater->func('property', array('uix_welcomeSection__icon', ), false)) {
				$__finalCompiled .= '
						<div class="media__object media--left">
							<span class="uix_welcomeSection__icon"><i class="uix_icon ' . $__templater->func('property', array('uix_welcomeSection__icon', ), true) . '"></i></span>
						</div>
						';
			}
			$__finalCompiled .= '

						<div class="media__body">
							';
			if ($__templater->func('property', array('uix_welcomeSection__title', ), false)) {
				$__finalCompiled .= '<div class="uix_welcomeSection__title">' . $__templater->func('property', array('uix_welcomeSection__title', ), true) . '</div>';
			}
			$__finalCompiled .= '

							';
			if ($__templater->func('property', array('uix_welcomeSection__text', ), false)) {
				$__finalCompiled .= '<div class="uix_welcomeSection__text">' . $__templater->func('property', array('uix_welcomeSection__text', ), true) . '</div>';
			}
			$__finalCompiled .= '

							';
			if ($__templater->func('property', array('uix_welcomeSection__url', ), false)) {
				$__finalCompiled .= $__templater->button($__templater->func('property', array('uix_welcomeSection__buttonText', ), true), array(
					'href' => $__templater->func('link', array($__templater->func('property', array('uix_welcomeSection__url', ), false), ), false),
					'class' => 'button--cta',
				), '', array(
				));
			}
			$__finalCompiled .= '
						</div>
					</div>
				</div>
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);