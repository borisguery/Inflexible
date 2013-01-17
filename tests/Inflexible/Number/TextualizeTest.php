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
class TextualizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Textualize::inflect($inputValue));
    }

    public function getTestData()
    {
        // TODO Need more tests
        return array(
            array(0,         'Zero'),
            array(1,         'One'),
            array(2,         'Two'),
            array(3,         'Three'),
            array(4,         'Four'),
            array(5,         'Five'),
            array(6,         'Six'),
            array(7,         'Seven'),
            array(8,         'Eight'),
            array(9,         'Nine'),
            array(10,        'Ten'),
            array(11,        'Eleven'),
            array(12,        'Twelve'),
            array(13,        'Thirteen'),
            array(14,        'Fourteen'),
            array(15,        'Fifteen'),
            array(16,        'Sixteen'),
            array(17,        'Seventeen'),
            array(18,        'Eighteen'),
            array(19,        'Nineteen'),
            array(20,        'Twenty'),
            array(30,        'Thirty'),
            array(40,        'Forty'),
            array(50,        'Fifty'),
            array(60,        'Sixty'),
            array(70,        'Seventy'),
            array(80,        'Eighty'),
            array(90,        'Ninety'),
            array(100,       'One Hundred'),
            array(1230,      'One Thousand, Two Hundred and Thirty'),
            array(1025433,   'One Million, Twenty Five Thousand, Four Hundred and Thirty Three'),
            array(254154545,  'Two Hundred and Fifty Four Million, One Hundred and Fifty Four Thousand, Five Hundred and Forty Five'),
            array(5000000000, 'Five Billion'),
        );
    }
}
