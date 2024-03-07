<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\Install;

use XF\Db\Schema\Alter;
use XF\Db\SchemaManager;

class Uninstall
{
    /**
     * Drop tables
     * @param SchemaManager $sm
     */
    public static function runStep1(SchemaManager $sm)
    {
        $sm->alterTable('xf_attachment_data', function(Alter $table)
        {
            $table->dropColumns('xfa_do');
            $table->dropColumns('xfa_url');
        });
    }
}