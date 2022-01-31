<?php 

namespace App\Services;

class DurationService {
    public function convertToMinutes($value)
    {
        $duration=$value;

        if (str_contains((String)$value,':')) {
            $durationParts=explode(':',$duration);
            $duration=((Int)$durationParts[0]*60)+(Int)$durationParts[1];
        }
        // Decimal format
        if (str_contains((String)$duration,'.')) {
            $duration = ($duration * 60);
        }
        return $duration;
    }
}