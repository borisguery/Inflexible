<?php

namespace Inflexible\String;

class DenamespaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, Denamespace::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array('\Foo',         'Foo'),
            array('Foo',          'Foo'),
            array('Foo\Bar',      'Bar'),
            array('\Foo\Bar',     'Bar'),
            array('\Foo\Bar\Baz', 'Baz'),
        );
    }
}
