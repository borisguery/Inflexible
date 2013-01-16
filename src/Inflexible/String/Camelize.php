<?php

namespace Inflexible\String;

use Inflexible\AbstractInflector;

class Camelize extends AbstractInflector
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
