<?php

namespace App;

use App\Completable;
use App\Completion;
use App\Resource;
use App\Skill;
use App\Track;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;
use Facades\App\UserPreference;

class Module extends Model implements Completable
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];

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
        $preference = session('resource-language-preference') ?? 'english-and-current';
        if ($user) {
            $preference = data_get(UserPreference::languagePreferences(), $user->preference->language);
        }

        $language = locale();
        switch (Str::slug($preference)) {
            case 'only-current':
                return $this->resources()->where(compact('language'))->get();
            case 'only-english':
                return $this->resources()->where('language', 'en')->get();
            case 'english-and-current':
                return $this->resources()
                        ->where(function ($query) use ($language) {
                            $query->where(compact('language'))->orWhere('language', 'en');
                        })->get();
        }
    }
}
