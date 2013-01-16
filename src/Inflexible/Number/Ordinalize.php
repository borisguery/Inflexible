<?php

namespace Inflexible\Number;

use Inflexible\AbstractInflector;

class Ordinalize extends AbstractInflector
{
    public static function inflect($value)
    {
        if (in_array(($value % 100), range(11, 13))) {

            $result = $value.'th';
        } else {
            switch (($value % 10)) {
                case 1:
                    $result = $value.'st';
                    break;

                case 2:
                    $result = $value.'nd';
                    break;

                case 3:
                    $result = $value.'rd';
                    break;

                default:
                    $result = $value.'th';
                    break;
            }
        }

        return $result;
    }
}
