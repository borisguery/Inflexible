<?php
/*
 * This file is part of the Inflexible package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Inflexible\String;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
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
