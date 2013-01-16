<?php

namespace Inflexible\Word;

class HumanizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Humanize::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array('boris_guery', 'Boris Guery'),
            array('BorisGuery',  'Boris Guery'),
        );
    }
}
