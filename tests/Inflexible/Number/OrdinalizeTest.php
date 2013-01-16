<?php

namespace Inflexible\Number;

class OrdinalizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Ordinalize::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array(1,    '1st'),
            array(2,    '2nd'),
            array(3,    '3rd'),
            array(4,    '4th'),
            array(11,   '11th'),
            array(12,   '12th'),
            array(13,   '13th'),
            array(1001, '1001st'),
            array(1062, '1062nd'),
            array(1113, '1113th'),
        );
    }
}
