<?php

namespace App\Models;

use App\Completable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class Module extends Model implements Completable
{
    use HasFactory;
    use HasTranslations;

    public const BEGINNER_SKILL_LEVEL = 'beginner';

    public const INTERMEDIATE_SKILL_LEVEL = 'intermediate';

    public const ADVANCED_SKILL_LEVEL = 'advanced';

    public const SKILL_LEVELS = [
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

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class)->withTimestamps();
    }

    public function suggestedResources(): HasMany
    {
        return $this->hasMany(SuggestedResource::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function completions(): MorphMany
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    public function tracks(): BelongsToMany
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

    public function getPrevious()
    {
        return Module::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getNext()
    {
        return Module::where('id', '>', $this->id)
            ->orderBy('id', 'asc')
            ->first();
    }
}
