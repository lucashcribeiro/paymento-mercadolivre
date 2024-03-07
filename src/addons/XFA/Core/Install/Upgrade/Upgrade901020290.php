<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\Install\Upgrade;

use XF\Db\Schema\Alter;
use XF\Db\SchemaManager;

class Upgrade901020290
{
    /**
     * Alter table
     * @param SchemaManager $sm
     */
    public static function runStep1(SchemaManager $sm)
    {
        // xf_attachment_data
        $sm->alterTable('xf_attachment_data', function(Alter $table)
        {
            $table->addColumn('xfa_do', 'int')->setDefault(0);
            $table->addColumn('xfa_url', 'varchar', 250)->setDefault('');
        });
    }
}