<?php
/*
 * This file is part of the Inflexible package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Inflexible;

use Inflexible\Datetime\Relative;
use Inflexible\Number\HumanByte;
use Inflexible\Number\Ordinalize;
use Inflexible\Number\Textualize;
use Inflexible\String\Camelize;
use Inflexible\String\Denamespace;
use Inflexible\String\Humanize;
use Inflexible\String\NamespaceOnly;
use Inflexible\String\Slugify;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class Inflexible
{
    public static function relativeDatetime($value, $relativeTo = null)
    {
        return Relative::inflect($value, $relativeTo);
    }

    public static function humanByte($bytes, $precision = 2)
    {
        return HumanByte::inflect($bytes, $precision);
    }

    public static function ordinalize($number)
    {
        return Ordinalize::inflect($number);
    }

    public static function textualize($number)
    {
        return Textualize::inflect($number);
    }

    public static function camelize($string)
    {
        return Camelize::inflect($string);
    }

    public static function denamespace($string)
    {
        return Denamespace::inflect($string);
    }

    public static function namespaceOnly($string)
    {
        return NamespaceOnly::inflect($string);
    }

    public static function humanize($string)
    {
        return Humanize::inflect($string);
    }

    public static function slugify($string, array $options = array())
    {
        return Slugify::inflect($string, $options);
    }
}
