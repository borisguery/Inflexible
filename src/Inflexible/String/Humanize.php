<?php
/*
 * This file is part of the Inflexible package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Inflexible\String;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class Humanize
{
    public static function inflect($value)
    {
        $result = strtolower(preg_replace('/(?<=\w)([A-Z])/', '_\\1', $value));
        $delimiter = '\\';
        if (false === strpos($delimiter, $result)) {
            $delimiter = '_';
        }
        $result = str_replace($delimiter, ' ', $result);
        $result = ucwords($result);

        return $result;
    }
}
