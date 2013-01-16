<?php

namespace Inflexible\String;

use Inflexible\AbstractInflector;

class Denamespace extends AbstractInflector
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
