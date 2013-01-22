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
class ShortenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param $inputValue
     * @param $expectedResult
     */
    public function testInflect($arguments, $expectedResult)
    {
        // method signature:
        // static function inflect($value, $maxLength = 80, $affix = null, $affixPosition = self::AFFIX_POSITION_MIDDLE)
        $actualResult = call_user_func_array('Inflexible\String\Shorten::inflect', $arguments);
        $this->assertEquals($expectedResult[0], $actualResult);
        if (null !== $expectedResult[1]) {
            $this->assertEquals($expectedResult[1], strlen($actualResult));
        }
    }

    public function getTestData()
    {
        return array(
            array(array('Lorem ipsum dolor sid amet'),                     array('Lorem ipsum dolor sid amet', null)),
            array(array('Lorem ipsum dolor sid amet', 1),                  array('L', 1)),
            array(array('Lorem ipsum dolor sid amet', 2),                  array('Lt', 2)),
            array(array('Lorem ipsum', 6, '...', 'middle'),                   array('Lor...sum', 9)),
            array(array('Lorem ipsum dolor sid amet', 10),                 array('Lorem amet', 10)),
            array(array('Lorem ipsum dolor sid amet', 10, '...'),          array('Lorem...amet', 12)),
            array(array('Lorem.ipsum dolor sid amet', 10, '...'),          array('Lorem...amet', 12)),
            array(array('Lorem ipsum dolor sid amet', 10, '...', 'start'), array('...Lorem ipsu', 13)),
            array(array('Lorem ipsum dolor sid amet', 10, null,  'start'),  array('Lorem ipsu', 10)),
            array(array('Lorem ipsum dolor sid amet', 10, '...', 'end'),   array('r sid amet...', 13)),
            array(array('Lorem ipsum dolor sid amet', 10, null,  'end'),    array('r sid amet', 10)),
        );
    }
}
