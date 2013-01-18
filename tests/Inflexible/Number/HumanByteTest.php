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
class HumanByteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, HumanByte::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array(1,             '1.00 B'),
            array(128,           '128.00 B'),
            array(256,           '256.00 B'),
            array(512,           '512.00 B'),
            array(1024,          '1.00 KB'),
            array(2048,          '2.00 KB'),
            array(196608,        '192.00 KB'),
            array(1048576,       '1.00 MB'),
            array(1073741824,    '1.00 GB'),
        );
    }
}
