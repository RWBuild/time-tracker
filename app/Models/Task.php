<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // relationships methods
    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }
}
