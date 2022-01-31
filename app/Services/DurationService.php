<?php
namespace App\Services;

class DurationService{
    public function convertToMinutes($value){

        $duration = $value;
        if(str_contains((string)$value, ':')){
            $durationParts = explode(":",$value);
            $duration = ((int)$durationParts[0]*60) + (int)$durationParts[1];
        }

        if(str_contains((string)$value,'.')){
            $duration = $value *60;
         }
         return $duration;
    }
}