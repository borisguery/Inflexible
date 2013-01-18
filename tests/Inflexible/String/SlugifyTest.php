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
class SlugifyTest extends \PHPUnit_Framework_TestCase
{
    public function testInflectValueBasic()
    {
        $value = 'Lorem ipsum dolor sid amet x 10 .';
        $this->assertEquals('lorem-ipsum-dolor-sid-amet-x-10', Slugify::inflect($value));
    }

    public function testInflectValueWithSpecialChars()
    {
        $value = 'lo\rem ipsum do|or sid amet||| #\`[|\" 10 .';
        $this->assertEquals('lo-rem-ipsum-do-or-sid-amet-10', Slugify::inflect($value));
    }

    public function testInflectValueWithUnicode()
    {
        $this->markTestIncomplete('Need to widely test UTF-8');
        $value = 'lørém ipßum dœlör sîd æmèt '; // space
        $this->assertEquals('lorem-ipssum-doelor-sid-aemet', Slugify::inflect($value));
    }

    public function testInflectValueWithCustomSeparator()
    {
        $this->markTestIncomplete('Need to widely test UTF-8');
        $value = 'lørém ipßum##dœlör sîd æmèt '; // space
        $options = array(
            'separator' => '#',
        );

        $this->assertEquals('lorem#ipssum#doelor#sid#aemet', Slugify::inflect($value, $options));
    }

    public function testInflectValueWithMaxLength()
    {
        $value = 'lørém ipßum dœlör sîd æmèt '; // space
        $options = array(
            'maxlength' => 13,
        );
        $result = Slugify::inflect($value, $options);
        $this->assertLessThanOrEqual(13, strlen($result));
    }

    public function testInflectValueWithLowercaseSetToFalse()
    {
        $this->markTestIncomplete('Need to widely test UTF-8');
        $value = 'LØrém iPßum dœlör Sîd æmèt '; // space
        $options = array(
            'lowercase' => false,
        );
        $result = Slugify::inflect($value, $options);
        $this->assertEquals('LOrem-iPssum-doelor-Sid-aemet', $result);
    }

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
