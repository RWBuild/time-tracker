<?php

namespace App\Models;

use App\Services\DurationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Timer\Duration;

class TimeEntry extends Model
{
    use HasFactory;

    //TODO 7. collum that are okay for mass assigment
    protected $fillable = ['project_id', 'user_id', 'task_id', 'duration', 'date'];

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

    // TODO 9. make Setduration or converttominute avalible to be updated
    public function setDurationAttribute($value){
      $this->attributes['duration'] = (new DurationService())->convertToMinutes($value);
    }

    public function getDurationAttribute($value){
        // check for null - return $value
        // value (int) number of minutes - and convert to 1:30
        return $value;
    }
}
