<?php

namespace App;

use App\Completable;
use App\Completion;
use App\Facades\Preferences;
use App\Module;
use Facades\App\Preferences\ResourceLanguagePreference;
use Illuminate\Database\Eloquent\Model;

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

    public function scopeForLocalePreferences($query, $locale, $resourceLanguagePreference)
    {
        switch ($resourceLanguagePreference) {
            case 'local':
                $query->where(['language' => $locale]);
                break;
            case 'local-and-english':
                $query->where(function ($query) use ($locale) {
                    $query->where(['language' => $locale])
                        ->orWhere('language', 'en');
                });
            case 'all':
                break;
        }
    }

    public function scopeForCurrentSession($query)
    {
        if (auth()->check()) {
            return $this->scopeForUser($query, auth()->user());
        }

        return $this->scopeForLocalePreferences(
            $query,
            locale(),
            Preferences::get(ResourceLanguagePreference::key())
        );
    }

    public function scopeForUser($query, $user = null)
    {
        $preference = 'local-and-english';

        if ($user ?? $user = auth()->user()) {
            $preference = Preferences::get(ResourceLanguagePreference::key());
        }

        $this->scopeForLocalePreferences($query, locale(), $preference);
    }
}
