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

    const BEGINNER_SKILL_LEVEL = 'beginner';
    const INTERMEDIATE_SKILL_LEVEL = 'intermediate';
    const ADVANCED_SKILL_LEVEL = 'advanced';

    const SKILL_LEVELS = [
        self::BEGINNER_SKILL_LEVEL => 'Beginner',
        self::INTERMEDIATE_SKILL_LEVEL => 'Intermediate',
        self::ADVANCED_SKILL_LEVEL => 'Advanced',
    ];

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

    public function scopeBeginner($query)
    {
        return $query->where('skill_level', self::BEGINNER_SKILL_LEVEL);
    }

    public function scopeIntermediate($query)
    {
        return $query->where('skill_level', self::INTERMEDIATE_SKILL_LEVEL);
    }

    public function scopeAdvanced($query)
    {
        return $query->where('skill_level', self::ADVANCED_SKILL_LEVEL);
    }
}
