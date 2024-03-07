<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2018
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core;

trait FinderRemoveWhere
{
    protected function removeSqlCondition($condition)
    {
        if ($this->parentFinder)
        {
            $this->parentFinder->writeSqlCondition($condition);
        }
        else
        {
            foreach($this->conditions AS $idx => $_condition)
            {
                if ($condition == $_condition)
                {
                    unset($this->conditions[$idx]);
                }
            }
        }
    }

    public function removeWhere($condition, $operator = null, $value = null)
    {
        $argCount = func_num_args();
        switch ($argCount)
        {
            case 1: $condition = $this->buildCondition($condition); break;
            case 2: $condition = $this->buildCondition($condition, $operator); break;
            case 3: $condition = $this->buildCondition($condition, $operator, $value); break;

            default: $condition = call_user_func_array([$this, 'buildCondition'], func_get_args());
        }

        $this->removeSqlCondition($condition);

        return $this;
    }
}