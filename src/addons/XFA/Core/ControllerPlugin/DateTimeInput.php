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

class DateTimeInput extends AbstractPlugin
{
    public function fromInput($key)
    {
        $request = $this->request;
        if ($request->exists($key))
        {
            /* Filter date and time */
            $dateData = $request->filter($key, ['date' => 'datetime', 'time' => 'str']);

            /* Check time is valid, if not return 0 */
            $parsedTimeData = date_parse($dateData['time']);
            if (count($parsedTimeData['errors']))
            {
                return 0;
            }

            /* Construct timestamp */
            try
            {
                $tz     = \XF::language()->getTimeZone();
                $date   = new \DateTime();
                $date->setTimezone($tz);
                $date->setTimestamp($dateData['date']);
                $date->setTime(
                    $parsedTimeData['hour'],
                    $parsedTimeData['minute'],
                    $parsedTimeData['second']
                );

                return $date->format('U');
            }
            catch(\Exception $e)
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }
}