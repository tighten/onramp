<?php

namespace App;

use App\Completable;
use App\Completion;
use App\Module;
use App\UserPreference;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Resource extends Model implements Completable
{
    protected $guarded = ['id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function completions()
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    public function scopeForUser($query, $user = null)
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
