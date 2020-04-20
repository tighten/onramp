<?php

namespace App;

use App\Completion;
use App\Resource;
use App\Skill;
use App\Track;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Module extends Model implements Completable
{
    use HasTranslations;

    public $translatable = ['name', 'description'];

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class)->withTimestamps();
    }

    public function suggestedResources()
    {
        return $this->hasMany(SuggestedResource::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function completions()
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }

    public function resourcesForCurrentSession()
    {
        return $this->resources()->forCurrentSession();
    }

    public function scopeStandard($query)
    {
        return $query->where('is_bonus', 0);
    }

    public function scopeBonus($query)
    {
        return $query->where('is_bonus', 1);
    }
}
