<?php
namespace App\Services;

class DurationService{
    public function convertToMinutes($value){
        $duration = $value;

        // check for colon format
        if (str_contains((String)$value, ':')){
            // 23:50
            // array[23, 50]
            $durationParts = explode(":", $value);
            $duration = ((Int)$durationParts[0] * 60) +(Int)$durationParts[1];
        }
        if(str_contains((String)$value, '.')){
            $duration = ($value * 60);
        }
        return $duration;
    }
}