<?php

namespace Inflexible;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
use Inflexible\Datetime\Relative;

class Inflexible {

    public static function relativeDatetime($value)
    {
        $i = new Relative($value);

        return $i->transform();
    }
}
