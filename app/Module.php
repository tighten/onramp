<?php

namespace App;

use App\Resource;
use App\Skill;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
