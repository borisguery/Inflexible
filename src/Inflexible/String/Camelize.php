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
class Camelize
{
    /**
     * Converts a word like "foo_bar" to "FooBar".
     * It also removes non-alphanumeric characters.
     *
     * @param $value
     * @return string
     */
    public static function inflect($value)
    {
        $result = str_replace(
            ' ',
            '',
            ucwords(
                preg_replace('/[^a-z0-9]+/i',' ',$value)
            )
        );

        return $result;
    }
}
