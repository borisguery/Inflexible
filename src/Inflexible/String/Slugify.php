<?php

namespace Inflexible\String;

class Slugify
{
    public static function inflect($value, array $options = array())
    {
        $separator = isset($options['separator']) ? $options['separator'] : '-';
        $lowercase = isset($options['lowercase']) ? $options['lowercase'] : true;
        $maxLength = isset($options['maxlength']) ? (int) $options['maxlength'] : null;

        $value = preg_replace('/[^\\pL\d]+/u', $separator, $value);
        $value = @iconv('UTF-8', 'US-ASCII//TRANSLIT', $value); // transliterate, silently
        $value = preg_replace('/[^'.$separator.'\w]+/', '', $value);

        if (null !== $maxLength) {
            $value = substr($value, 0, (int) $maxLength);
        }
        $value = trim($value, $separator);

        if ($lowercase) {
            $value = strtolower($value);
        }

        if (empty($value)) {
            $value = '';
        }

        return $value;
    }
}
