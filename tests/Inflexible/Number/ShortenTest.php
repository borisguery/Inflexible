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
class ShortenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Shorten::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array(1,             array(1,   null)),
            array(128,           array(128, null)),
            array(999,           array(999, null)),
            array(2048,          array(2,   'k')),
            array(196608,        array(192, 'k')),
            array(1048576,       array(1,   'M')),
            array(1073741824,    array(1,   'G')),
        );
    }
}
