<?php

namespace App;

use App\Module;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $casts = [
        'is_bonus' => 'boolean',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
