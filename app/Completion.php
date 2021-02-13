<?php

namespace App;

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
        return $query->where('completable_type', Module::class);
    }

    public function scopeResources($query)
    {
        return $query->where('completable_type', Resource::class);
    }

    public function scopeSkills($query)
    {
        return $query->where('completable_type', Skill::class);
    }
}
