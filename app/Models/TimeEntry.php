<?php

namespace App\Models;

use App\Services\DurationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    use HasFactory;
    protected  $fillable =['project_id','user_id','task_id','duration','date']; 
    public function project()
    {
      return $this->belongsTo(Project::class);
    }

    public function task()
    {
      return $this->belongsTo(Task::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

  
    public function setDurationAttribute($value)
    {
      $this->attributes['duration'] = (new DurationService())->convertToMinutes($value);
    }
    public function getDurationAttribute($value)
    { 
    return $value;      
    }
    
}
