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

use InvalidArgumentException;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class Shorten
{
    const AFFIX_POSITION_START  = 'start';
    const AFFIX_POSITION_END    = 'end';
    const AFFIX_POSITION_MIDDLE = 'middle';

    /**
     * @param string $value         The value to shorten
     * @param int    $maxLength     The max length of the shortened string, default to 80
     * @param string $affix         The string to separate chunks
     * @param string $affixPosition The position of the affix, maybe 'start', 'middle', 'end' or a custom
     *                              integer position
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function inflect($value, $maxLength = 80, $affix = '', $affixPosition = self::AFFIX_POSITION_MIDDLE)
    {
        if (null === $affixPosition) {
            // sensible default
            $affixPosition = self::AFFIX_POSITION_MIDDLE;
        }

        $affix = (string) $affix;

        if (!in_array(strtolower($affixPosition), array(
            self::AFFIX_POSITION_START,
            self::AFFIX_POSITION_MIDDLE,
            self::AFFIX_POSITION_END
        )) && !is_numeric($affixPosition)) {
            throw new InvalidArgumentException(
                sprintf('Incorrect position provided "%s", must be one of the predefined constants or an integer', $affixPosition)
            );
        }

        $shortenedString = $value;

        if (strlen($shortenedString) > $maxLength) {
                switch ($affixPosition) {
                    case self::AFFIX_POSITION_START:
                        $shortenedString = $affix . substr($value, 0, $maxLength);
                        break;
                    case self::AFFIX_POSITION_END:
                        $position = $maxLength;
                        $shortenedString = substr($value, -$position) . $affix;
                        break;
                    case self::AFFIX_POSITION_MIDDLE:
                        $position = (int) floor($maxLength / 2);
                        if (0 === $position) {
                            $shortenedString = substr($value, 0, 1);
                        } else {
                            $shortenedString = substr($value, 0, $position);
                            if (strlen($affix) > 0) {
                                $shortenedString = rtrim(rtrim($shortenedString, preg_replace('/(.)\1{1}/', '', $affix)));
                                $shortenedString .= $affix;
                                $shortenedString .= ltrim(ltrim(substr($value, -$position), preg_replace('/(.)\1{1}/', '', $affix)));
                            } else {
                                $shortenedString .= substr($value, -$position);
                            }
                        }
                        break;
                    default:
                        $position = $affixPosition;
                        $shortenedString = substr(substr_replace($value, $affix, $position, 0), 0, $maxLength);
                }
        }

        return $shortenedString;
    }
}
