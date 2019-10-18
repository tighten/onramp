<?php

namespace App;

use App\Completable;
use App\Completion;
use App\Resource;
use App\Skill;
use App\Track;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Module extends Model implements Completable
{
    use HasTranslations;

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
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

    public function resourcesForUser($user)
    {
        // get the user's language and preference, and only select appropriate resources
        // @todo make this actually function
        // $language = locale();
        // $preference = enum('only current', 'only english', 'english and current')
        $preference = 'only-current'; // @todo pull from user's preferences or whatever

        switch ($preference) {
            case 'only-current':
                return $this->resources()->where('language', locale())->get();
        }
    }
}
