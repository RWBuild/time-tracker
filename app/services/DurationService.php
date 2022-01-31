<?php

namespace App\Services;

// TODO 7. Duration Services
class DurationService
{
    public function convertToMinutes($value)
    {
        $duration = $value;

        // check for colon format
        if (str_contains((string)$value, ":")) {
            $durationPart = explode(":", $value); // explode the $duration(string) into array('1', '30') from '1:30'
            $duration = ((int)$durationPart[0] * 60) + (int)$durationPart[1];
        }

        // check for decimal format
        if (str_contains((string)$value, ".")) {
            $duration = ($value * 60);
        }

        return $duration;
    }
}
