<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XFA\Core\Install\Install;
use XFA\Core\Install\Uninstall;
use XFA\Core\Install\Upgrade\Upgrade901020290;
use XFA\Core\Install\Upgrade\Upgrade901040090;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

    /**
     * Install Step1
     */
    public function installStep1()
    {
        $sm = $this->schemaManager();
        Install::runStep1($sm);
    }

    /**
     * Upgrade
     */
    //Upgrade From 1.2.1 To 1.2.2
    public function upgrade901020290Step1()
    {
        $sm = $this->schemaManager();
        Upgrade901020290::runStep1($sm);
    }

    //Upgrade From 1.3.0 To 1.4.0
    public function upgrade901040090Step1()
    {
        $sm = $this->schemaManager();
        Upgrade901040090::runStep1($sm);
    }

    /**
     * Uninstall Step 1
     */
    public function uninstallStep1()
    {
        $sm = $this->schemaManager();
        Uninstall::runStep1($sm);
    }
}