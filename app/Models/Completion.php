<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Completion extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'user_id' => 'int',
            'completable_id' => 'int',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function completable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeModules($query)
    {
        return $query->where('completable_type', (new Module)->getMorphClass());
    }

    public function scopeResources($query)
    {
        return $query->where('completable_type', (new Resource)->getMorphClass());
    }

    public function scopeSkills($query)
    {
        return $query->where('completable_type', (new Skill)->getMorphClass());
    }
}
