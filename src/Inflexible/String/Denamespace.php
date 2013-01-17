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

class Denamespace
{
    /**
     * Returns only the class name
     *
     * @param $value
     * @return string
     */
    public static function inflect($value)
    {
        $className = trim($value, '\\');
        if ($lastSeparator = strrpos($className, '\\')) {
            $className = substr($className, 1 + $lastSeparator);
        }

        return $className;
    }
}
