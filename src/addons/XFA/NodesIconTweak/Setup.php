<?php
/*************************************************************************
 * XenForo Nodes Icon Tweak - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\NodesIconTweak;

use XF\AddOn\AbstractSetup;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{
    public function install(array $stepParams = [])
    {
        $sm = $this->schemaManager();

        $sm->alterTable('xf_node', function(Alter $table)
        {
            $table->addColumn('xfa_nit_type', 'tinyint', 3)->unsigned()->setDefault(0);
            $table->addColumn('xfa_nit_params', 'text')->nullable()->setDefault('NULL');
        });
    }

    public function upgrade(array $stepParams = [])
    {
        if ($this->addOn->version_id < 903000590)
        {
            \XF::app()->jobManager()->enqueueUnique(
                'XFANITUpgradeNode903000590',
                'XFA\NodesIconTweak:Upgrade\Node903000590',
                [],
                false
            );
        }
    }

    public function uninstall(array $stepParams = [])
    {
        $sm = $this->schemaManager();

        $sm->alterTable('xf_node', function(Alter $table)
        {
            $table->dropColumns(array('xfa_nit_type', 'xfa_nit_params'));
        });
    }
}