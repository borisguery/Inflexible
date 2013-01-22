<?php
/*
 * This file is part of the Inflexible package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Inflexible\Number;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class Shorten
{
    public static function inflect($number, $mode = PHP_ROUND_HALF_UP)
    {
        // @see http://fr.wikipedia.org/wiki/Pr%C3%A9fixes_du_syst%C3%A8me_international_d'unit%C3%A9s
        // @see http://en.wikipedia.org/wiki/Metric_prefix
        // No units for number < 1000
        $units = array(null, 'k', 'M', 'G', 'T');
        $number = max($number, 0);
        $pow = floor(($number ? log($number) : 0) / log(1000));
        $pow = min($pow, count($units) - 1);
        $number /= (1 << (10 * $pow));

        return array(
            (int) round($number, 0, $mode),
            $units[$pow],
        );
    }
}
