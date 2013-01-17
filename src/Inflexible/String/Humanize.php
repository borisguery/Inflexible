<?php

namespace Inflexible\String;

class Humanize
{
    public static function inflect($value)
    {
        $result = strtolower(preg_replace('/(?<=\w)([A-Z])/', '_\\1', $value));
        $delimiter = '\\';
        if(false === strpos($delimiter, $result)) {
            $delimiter = '_';
        }
        $result= str_replace($delimiter, ' ', $result);
        $result= ucwords($result);
        
        return $result;
    }
}
