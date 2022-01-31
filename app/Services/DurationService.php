<?php

namespace App\Services;

class DurationService{
    public function convertToMinutes($value){
        $duration = $value;
        //check for column format
        if (str_contains((string)$value, ':')) {
            $durationParts = explode(":", $value);
            $duration = ((int)$durationParts[0] * 60) + (int)$durationParts[1];
        }
        //check for decimal format
        if (str_contains((string)$value, '.')) {
            $duration = $value * 60;
        }
        return $duration;
    }
}
