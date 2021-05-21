<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
}
