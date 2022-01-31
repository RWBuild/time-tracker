<?php

namespace App\services;

class DurationService
{
    public function convertToMinutes($value)
    {
        $duration = $value;

        // check for colon format
        if(str_contains((String)$value,':')){
            $durationParts= explode(":",$value);
            $duration = ((Int)$durationParts[0]*60) +(Int)$durationParts[1];
        }

        //check for decimal format
        if(str_contains((String)$value,'.')){
            $duration = ($value * 60);
        }
        
        
        return $duration;

    }
}