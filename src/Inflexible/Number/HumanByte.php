<?php

namespace Inflexible\Number;

class HumanByte
{
    public static function inflect($bytes)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return sprintf('%4.02f %s', round($bytes, 2), $units[$pow]);
    }
}
