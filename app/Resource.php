<?php

namespace App;

use App\Completable;
use App\Completion;
use App\Module;
use App\Facades\Preferences;
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

    public function scopeForUser($query, $user = null)
    {
        $preference = 'english-and-current';

        if ($user ?? $user = auth()->user()) {
            $preference = Preferences::get('resource-language-preference');
        }

        $this->scopeForLocalePreferences($query, locale(), $preference);
    }
}
