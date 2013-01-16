<?php

namespace Inflexible\Datetime;

use DateTime;
use Inflexible\Exception\MethodNotImplementedException;
use Inflexible\InflectorInterface;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class Relative implements InflectorInterface
{
    private $seconds;
    private $relativeTo;

    private $unitsMap = array(
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
     * @param DateTime|integer $value
     * @param DateTime|boolean $relativeTo
     */
    public function __construct($value, $relativeTo = null)
    {
        if ($value instanceof DateTime) {
            $this->seconds = $value->format('U');
        } else {
            $this->seconds = $value;
        }

        $this->relativeTo = $relativeTo;
    }

    public function transform()
    {

        if (null !== $this->relativeTo) {
            $relativeTo = (true === $this->relativeTo) ? new DateTime('now') : $this->relativeTo;

            $value = $relativeTo->format('U') - $this->seconds;
        } else {
            $value = $this->seconds;
        }

        foreach ($this->unitsMap as $map) {
            list($seconds, $unit) = $map;
            if (0.0 !== ($result = floor($value / $seconds))) {

                break;
            }
        }

        return array($result, $unit);
    }

    public function reverseTransform()
    {
        throw new MethodNotImplementedException();
    }
}
