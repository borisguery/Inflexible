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
