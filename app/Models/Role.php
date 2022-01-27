<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const IS_USER = 1;
    public const IS_OWNER = 2;
    public const IS_ADMIN = 3;

    public function users()
    {
        return $this->blongsToMany(User::class);
    }
}
