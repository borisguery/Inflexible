<?php
/*
 * This file is part of the Inflexible package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Inflexible\Datetime;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class RelativeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testTransform($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Relative::inflect($inputValue));
    }

    /**
     * @dataProvider getTestDataWithRelativeDatetime
     *
     * @param $inputValue
     * @param $relativeTo
     * @param $expectedResult
     */
    public function testTransformWithARelativeDateTime($inputValue, $relativeTo, $expectedResult)
    {
        $this->assertEquals($expectedResult, Relative::inflect($inputValue, $relativeTo));
    }

    public function getTestData()
    {
        return array(
            array(59,          array(59, 'second')),
            array(60,          array(1,  'minute')),
            array(1799,        array(29, 'minute')),
            array(1800,        array(30, 'minute')),
            array(3600,        array(1,  'hour')),
            array(86399,       array(23, 'hour')),
            array(86400,       array(1,  'day')),
            array(86401,       array(1,  'day')),
            array(86400 * 2,   array(2,  'day')),
            array(86400 * 6,   array(6,  'day')),
            array(86400 * 7,   array(1,  'week')),
            array(86400 * 8,   array(1,  'week')),
            array(86400 * 14,  array(2,  'week')),
            array(86400 * 30,  array(4,  'week')),
            array(86400 * 31,  array(1,  'month')),
            array(86400 * 365, array(1,  'year')),
        );
    }

    public function getTestDataWithRelativeDatetime()
    {
        return array(
            array(new \DateTime('2013-01-10T00:00:50'), new \DateTime('2013-01-10T00:01:00'), array(10, 'second')),
            array(new \DateTime('2013-01-10T00:00:50'), new \DateTime('2013-01-10T00:01:50'), array(1,  'minute')),
            array(new \DateTime('2013-01-10T00:00:50'), new \DateTime('2013-01-16T00:01:50'), array(6,  'day')),
            array(new \DateTime('2013-01-10'), new \DateTime('2013-01-17'), array(1, 'week')),
            array(new \DateTime('2013-01-10'), new \DateTime('2013-02-10'), array(1, 'month')),
        );
    }
}
