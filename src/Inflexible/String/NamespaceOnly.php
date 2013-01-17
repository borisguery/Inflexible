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
class NamespaceOnly
{
    /**
     * Returns only the class name
     *
     * @param $fqcn The Fully Qualified Class Name
     * @return string The namespace
     */
    public static function inflect($fqcn)
    {
        if ($lastSeparator = strrpos($fqcn, '\\')) {

            return trim(substr($fqcn, 0, $lastSeparator + 1), '\\');
        }

        return '';
    }
}
