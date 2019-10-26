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

        if ($user ?? $user = auth()->user()) {
            $preference = $user->preferences()->get('resource-language-preference');
        }

        switch (Str::slug($preference)) {
            case 'only-current':
                $query->where(['language' => locale()]);
                break;
            case 'only-english':
                $query->where('language', 'en');
                break;
            case 'english-and-current':
                $query->where(function ($query) {
                    $query->where(['language' => locale()])
                        ->orWhere('language', 'en');
                });
        }
    }
}
