<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\timeEntry;

class Task extends Model
{
    use HasFactory;

    // Relationship
    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }
}
