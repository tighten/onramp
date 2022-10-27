<?php

namespace App\Models;

use App\Completable;
use App\Facades\Preferences;
use App\Models\Term;
use App\OperatingSystem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model implements Completable
{
    use HasFactory;
    use SoftDeletes;

    public const VIDEO_TYPE = 'video';
    public const COURSE_TYPE = 'course';
    public const AUDIO_TYPE = 'audio';
    public const BOOK_TYPE = 'book';
    public const ARTICLE_TYPE = 'article';

    public const TYPES = [
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

    protected static function booted()
    {
        static::creating(function ($resource) {
            if ($resource->can_expire) {
                $resource->expiration_date = now()->addMonths(6);
            }
        });
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    public function completions()
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    public function terms()
    {
        return $this->belongsToMany(Term::class)->withTimestamps();
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
        return $query->where('expiration_date', '<', now()->toDateTimeString());
    }

    public function scopeExpiring($query)
    {
        return $query->whereBetween('expiration_date', [
            now()->toDateTimeString(),
            now()->addDays(15)->toDateTimeString(),
        ]);
    }

    public function getIsNewAttribute()
    {
        return $this->created_at->diffInDays(now()) <= 14;
    }

    public function getDaysTilExpiredAttribute()
    {
        return $this->expiration_date->diffForHumans();
    }

    public function getIsTrashedAttribute()
    {
        return $this->deleted_at ? 'Yes' : 'No';
    }

    public function isAssignedToAModule()
    {
        return collect($this->modules)->isNotEmpty();
    }

    public function isExpired()
    {
        return $this->expiration_date?->isPast();
    }

    public function isExpiring()
    {
        return $this->expiration_date->between(
            now()->toDateTimeString(),
            now()->addDays(15)->toDateTimeString(),
        );
    }
}
