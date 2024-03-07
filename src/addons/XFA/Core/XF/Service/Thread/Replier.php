<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\XF\Service\Thread;

class Replier extends XFCP_Replier
{
    public function setAutomatedUser(\XF\Entity\User $user)
    {
        $this->setIsAutomated();

        $this->user             = $user;
        $this->post->user_id    = $user->user_id;
        $this->post->username   = $user->username;
    }
}