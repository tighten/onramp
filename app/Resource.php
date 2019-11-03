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
    const VIDEO_TYPE = 'video';
    const COURSE_TYPE = 'course';
    const AUDIO_TYPE = 'audio';
    const BOOK_TYPE = 'book';
    const ARTICLE_TYPE = 'article';

    const TYPES = [
        self::VIDEO_TYPE,
        self::COURSE_TYPE,
        self::AUDIO_TYPE,
        self::BOOK_TYPE,
        self::ARTICLE_TYPE,
    ];

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
            $preference = data_get(UserPreference::languagePreferences(), $user->preference->language);
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
        
        if ($user && $user->os != OperatingSystem::ANY) {
            $query->whereIn('os', [OperatingSystem::ANY, $user->os]);
        }
    }
}
