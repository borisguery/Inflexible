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
class NamespaceOnlyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($inputValue, $expectedResult)
    {
        $this->assertEquals($expectedResult, NamespaceOnly::inflect($inputValue));
    }

    public function getTestData()
    {
        return array(
            array('\Foo',         ''),
            array('Foo',          ''),
            array('Foo\Bar',      'Foo'),
            array('\Foo\Bar',     'Foo'),
            array('\Foo\Bar\Baz', 'Foo\Bar'),
        );
    }
}
