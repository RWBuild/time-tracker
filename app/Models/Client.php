<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    //TODO: projects misspelled
    public function projcts() {
        return $this->hasMany(Project::class);
    }
}
