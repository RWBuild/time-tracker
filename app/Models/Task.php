<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //Relationship with TimeEntry mode
    public function time_entries() {
        return $this->hasMany(TimeEntry::class);
      }
  


}
