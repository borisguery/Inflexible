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

class Textualize
{
    private static $onesNumbers = array(
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
    );

    private static $tensNumbers = array(
        0 => 'Ten',
        1 => 'Eleven',
        2 => 'Twelve',
        3 => 'Thirteen',
        4 => 'Fourteen',
        5 => 'Fifteen',
        6 => 'Sixteen',
        7 => 'Seventeen',
        8 => 'Eighteen',
        9 => 'Nineteen',
    );

    private static $hundredsNumbers = array(
        2 => 'Twenty',
        3 => 'Thirty',
        4 => 'Forty',
        5 => 'Fifty',
        6 => 'Sixty',
        7 => 'Seventy',
        8 => 'Eighty',
        9 => 'Ninety',
    );

    private static $otherNumbers = array(
        1  => 'Thousand',
        2  => 'Million',
        3  => 'Billion',
        4  => 'Trillion',
        5  => 'Quadrillion',
        6  => 'Quintillion',
        7  => 'Sextillion',
        8  => 'Septillion',
        9  => 'Octillion',
        10  => 'Nonillion',
        11 => 'Decillion',
    );

    /**
     * Returns a textual representation of a number
     *
     * @param integer $number
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function inflect($number)
    {
        if (!is_numeric($number)) {

            throw new \InvalidArgumentException(sprintf('$number should be numeric, "%s" given', gettype($number)));
        }

        if (0 == $number) {

            return 'Zero';
        }

        $numbers = str_split($number, 1);
        krsort($numbers);
        $chunks = array_chunk($numbers, 3);
        krsort($chunks);

        $finalNumber = array();
        foreach ($chunks as $k => $v) {
            ksort($v);
            $temp = trim(self::parseNumber(implode('', $v)));
            if ($temp != '') {
                $finalNumber[$k] = $temp;
                if (isset(self::$otherNumbers[$k]) && self::$otherNumbers[$k] != '') {
                    $finalNumber[$k] .= ' ' . self::$otherNumbers[$k];
                }
            }
        }

        return implode(', ', $finalNumber);
    }

    private static function parseNumber($number)
    {
        $tmp = array();
        
        if (isset($number[2])) {
            if (isset(self::$onesNumbers[$number[2]])) {
                $tmp['hundreds'] = self::$onesNumbers[$number[2]] . ' Hundred';
            }
        }

        if (isset($number[1])) {
            if ($number[1] == 1) {
                $tmp['tens'] = self::$tensNumbers[$number[0]];
            } else {
                if (isset(self::$hundredsNumbers[$number[1]])) {
                    $tmp['tens'] = self::$hundredsNumbers[$number[1]];
                }
            }
        }

        if (!isset($number[1]) || $number[1] != 1) {
            if (isset(self::$onesNumbers[$number[0]])) {
                if (isset($tmp['tens'])) {
                    $tmp['tens'] .= ' ' . self::$onesNumbers[$number[0]];
                } else {
                    $tmp['units'] = self::$onesNumbers[$number[0]];
                }
            }
        }

        return implode(' and ', $tmp);
    }
}
