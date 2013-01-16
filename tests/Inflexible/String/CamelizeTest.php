<?php

namespace Inflexible\String;

class CamelizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Camelize::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array('boris_guery', 'BorisGuery'),
            array('BorisGuery',  'BorisGuery'),
            array('Boris^Guery', 'BorisGuery'),
            array('boris-Guery', 'BorisGuery'),
        );
    }
}
