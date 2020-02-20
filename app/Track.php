<?php

namespace App;

use App\Module;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
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
