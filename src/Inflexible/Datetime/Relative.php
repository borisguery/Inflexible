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
    private $value;
    private $relativeTo;

    private $unitsMap = array(
        array('s', 'second', 'seconds'),
        array('m', 'minute', 'minutes'),
        array('h', 'hour',   'hours'),
        array('d', 'day',    'days'),
        array('w', 'week',   'weeks'),
        array('o', 'month',  'months'), // we used the second letter of the word month to avoid conflicts with minutes
        array('y', 'year',   'years'),
    );

    /**
     * Value may be either a DateTime instance, an integer in seconds since Unix Epoch,
     * or valid relative array including correct unit
     *
     * @param DateTime|integer|array $value
     * @param DateTime|integer|array $relativeTo
     */
    public function __construct($value, $relativeTo = null)
    {
        $this->value      = $value;
        $this->relativeTo = $relativeTo;
    }

    public function transform()
    {

    }

    public function reverseTransform()
    {
        throw new MethodNotImplementedException();
    }
}
