<?php

namespace Inflexible\Datetime;

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
        $inflector = new Relative($inputValue);

        $this->assertEquals($expectedResult, $inflector->transform());
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
}
