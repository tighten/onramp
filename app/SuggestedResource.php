<?php

namespace App;

use App\Nova\User;
use Illuminate\Database\Eloquent\Model;

class SuggestedResource extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($suggestedResource) {
            if (auth()->check()) {
                $suggestedResource->user_id = auth()->id();
            }
        });
    }
}
