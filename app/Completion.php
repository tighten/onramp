<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function completable()
    {
        return $this->morphTo();
    }

    public function scopeModules($query)
    {
        return $query->where('completable_type', \App\Module::class);
    }

    public function scopeResources($query)
    {
        return $query->where('completable_type', \App\Resource::class);
    }

    public function scopeSkills($query)
    {
        return $query->where('completable_type', \App\Skill::class);
    }
}
