<?php

namespace App\Models;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function timeEntries(){
        return $this->hasMany(Time::class);
    }
}
