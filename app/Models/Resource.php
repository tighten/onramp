<?php

namespace App\Models;

use App\Completable;
use App\Facades\Preferences;
use App\OperatingSystem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model implements Completable
{
    use HasFactory;

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

    protected $appends = ['is_new'];
    protected $guarded = ['id'];
    protected $casts = [
        'id' => 'int',
        'is_bonus' => 'boolean',
        'is_free' => 'boolean',
        'can_expire' => 'boolean',
        'expiration_date' => 'datetime',
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

    public function scopeExpired($query)
    {
        return $query->where('expiration_date', '<', Carbon::now()->toDateTimeString());
    }

    public function getIsNewAttribute()
    {
        return $this->created_at->diffInDays(now()) <= 14;
    }

    public function getDaysExpiredAttribute()
    {
        if (! $this->isExpired()) {
            return '0 Days';
        }

        $daysExpired = $this->expiration_date->diffInDays(now());
        $daysLabel = $daysExpired === 1 ? ' Day' : ' Days';

        return $daysExpired . $daysLabel;
    }

    public function isAssignedToAModule()
    {
        return collect($this->modules)->isNotEmpty();
    }

    public function isExpired()
    {
        return $this->expiration_date->isPast();
    }
}
