<?php

namespace App\Services;
class DurationService
{
    public function convertToMinutes($value)
    {
        $duration = $value;
    // check for colon format
    if(str_contains($value, ':'))
    {  
        $durationParts= explode(":",$value);
        $duration = ((Int)$durationParts[0]*60) + (Int)$durationParts[1];

    }
    //check for dot
    if(str_contains($value, '.'))
    {  
        $duration= ($value * 60);

    }

        return $duration;
    }
}