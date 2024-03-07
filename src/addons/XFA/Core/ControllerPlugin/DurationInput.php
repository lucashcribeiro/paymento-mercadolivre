<?php
/*************************************************************************
 * XFA Core - Xen Factory (c) 2017
 * All Rights Reserved.
 * Created by Clement Letonnelier aka. MtoR
 *************************************************************************
 * This file is subject to the terms and conditions defined in the Licence
 * Agreement available at http://xen-factory.com/pages/license-agreement/.
 *************************************************************************/

namespace XFA\Core\ControllerPlugin;

use XF\ControllerPlugin\AbstractPlugin;

class DurationInput extends AbstractPlugin
{
    public function fromInput($key, $withHours = true, $withMinutes = true, $withSeconds = true, $withDays = false)
    {
        $request = $this->request;
        if ($request->exists($key))
        {
            /* Construct filter array */
            $filterArray = [];
            if ($withDays)
            {
                $filterArray['days']    = 'uint';
            }
            if ($withHours)
            {
                $filterArray['hours']   = 'uint';
            }
            if ($withMinutes)
            {
                $filterArray['minutes'] = 'uint';
            }
            if ($withSeconds)
            {
                $filterArray['seconds'] = 'uint';
            }

            /* Filter input */
            $data = $request->filter($key, $filterArray);

            /* Compute duration */
            $duration = 0;
            if ($withDays)
            {
                $duration += $data['days'] * 86400;
            }
            if ($withHours)
            {
                $duration += $data['hours'] * 3600;
            }
            if ($withMinutes)
            {
                $duration += $data['minutes'] * 60;
            }
            if ($withSeconds)
            {
                $duration += $data['seconds'];
            }

            return $duration;
        }
        else
        {
            return 0;
        }
    }
}