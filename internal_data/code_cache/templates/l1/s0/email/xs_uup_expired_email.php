<?php
// FROM HASH: 4985fb178863902699fa54b71091b55d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' The account upgrade has expired' . '
</mail:subject>

' . '' . $__templater->escape($__vars['username']) . ', your account upgrade <i><b>' . $__templater->escape($__vars['upgradeTitle']) . '</b></i> at ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' has expired.<br />Thank you for having purchased this upgrade and we hope you have enjoyed the benefits it offered.<br />You may extend or renew your account upgrades <a href="' . $__templater->escape($__vars['upgradeUrl']) . '" style="color: #176093; text-decoration: none">here</a>. <p>Sincerely,<br />
' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</p>' . '

' . '<p class="minorText">Please do not reply to this message. You must visit the forum to reply.</p>

<p class="minorText">This message was sent to you because you opted to receive emails when your user upgrades are about to expire or have expired at ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '.</p>

<p class="minorText">If you no longer wish to receive these emails, you may <a href="' . $__templater->func('link', array('canonical:email-stop/content', $__vars['xf']['toUser'], array('id' => $__vars['xf']['toUser']['user_id'], ), ), true) . '">disable emails when your user upgrades are about to expire or have expired</a> or <a href="' . $__templater->func('link', array('canonical:email-stop/all', $__vars['xf']['toUser'], ), true) . '">disable all emails</a>.</p>';
	return $__finalCompiled;
}
);