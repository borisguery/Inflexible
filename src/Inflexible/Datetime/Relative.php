<?php
/*
 * This file is part of the Inflexible package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Inflexible\Datetime;

use DateTime;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class Relative
{
    private static $unitsMap = array(
        array(31536000, 'year'  ),
        array( 2628600, 'month' ),
        array(  604800, 'week'  ),
        array(   86400, 'day'   ),
        array(    3600, 'hour'  ),
        array(      60, 'minute'),
        array(       1, 'second'),
    );

    /**
     * Value may be either a DateTime instance or an integer in seconds
     *
     * $relativeTo may be either a DateTime instance or a boolean
     * If sets to true, the current DateTime is used
     *
     * @param  DateTime|integer $value
     * @param  DateTime|boolean $relativeTo
     * @return array
     */
    public static function inflect($value, $relativeTo = null)
    {
        if ($value instanceof DateTime) {
            $seconds = $value->format('U');
        } else {
            $seconds = $value;
        }

        if (null !== $relativeTo) {
            $relativeTo = (true === $relativeTo) ? new DateTime('now') : $relativeTo;

            $value = $relativeTo->format('U') - $seconds;
        } else {
            $value = $seconds;
        }

        foreach (self::$unitsMap as $map) {
            list($seconds, $unit) = $map;
            if (0.0 !== ($result = floor($value / $seconds))) {

                break;
            }
        }

        return array($result, $unit);
    }
}
