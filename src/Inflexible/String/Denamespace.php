<?php

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
