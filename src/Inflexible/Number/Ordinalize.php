<?php

namespace Inflexible\Number;

class Ordinalize
{
    public static function inflect($value)
    {
        if (in_array(($value % 100), range(11, 13))) {
            $result = sprintf('%sth', $value);
        } else {
            switch (($value % 10)) {
                case 1:
                    $result = sprintf('%sst', $value);
                    break;

                case 2:
                    $result = sprintf('%snd', $value);
                    break;

                case 3:
                    $result = sprintf('%srd', $value);
                    break;

                default:
                    $result = sprintf('%sth', $value);
                    break;
            }
        }

        return $result;
    }
}
