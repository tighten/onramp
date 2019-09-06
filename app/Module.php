<?php

namespace App;

use App\Skill;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
