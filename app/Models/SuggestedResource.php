<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Laravel\Nova\Actions\Actionable;

class SuggestedResource extends Model
{
    use HasFactory;
    use Actionable;

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

    const SUGGESTED_STATUS = 'suggested';
    const APPROVED_STATUS = 'approved';
    const REJECTED_STATUS = 'rejected';

    protected $guarded = ['id'];
    protected $casts = [
        'user_id' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($suggestedResource) {
            if (auth()->check()) {
                $suggestedResource->user_id = auth()->id();
            }
        });

        static::created(function ($suggestedResource) {
            Event::dispatch('new-suggested-resource', [$suggestedResource]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function isPendingReview()
    {
        return $this->status === self::SUGGESTED_STATUS;
    }
}
