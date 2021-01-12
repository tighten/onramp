<?php

namespace App;

use App\Facades\Preferences;
use Illuminate\Database\Eloquent\Model;

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
    protected $casts = [
        'is_bonus' => 'boolean',
        'is_free' => 'boolean',
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    public function completions()
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    public function scopeForCurrentSession($query)
    {
        $this->scopeForLocalePreferences($query);

        if (auth()->check()) {
            $query->whereIn('os', [OperatingSystem::ANY, Preferences::get('operating-system')]);
        }
    }

    protected function scopeForLocalePreferences($query)
    {
        switch (Preferences::get('resource-language')) {
            case 'local':
                $query->where(['language' => locale()]);

                break;
            case 'local-and-english':
                $query->where(function ($query) {
                    $query->where(['language' => locale()])
                        ->orWhere('language', 'en');
                });

                break;
            case 'all':
                break;
        }
    }

    public function isAssignedToAModule()
    {
        return collect($this->modules)->isNotEmpty();
    }
}
