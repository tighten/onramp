<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Completion extends Model
{
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function completable(): MorphTo
    {
        return $this->morphTo();
    }

    #[Scope]
    protected function modules($query)
    {
        return $query->where('completable_type', (new Module)->getMorphClass());
    }

    #[Scope]
    protected function resources($query)
    {
        return $query->where('completable_type', (new Resource)->getMorphClass());
    }

    #[Scope]
    protected function skills($query)
    {
        return $query->where('completable_type', (new Skill)->getMorphClass());
    }

    protected function casts(): array
    {
        return [
            'user_id' => 'int',
            'completable_id' => 'int',
        ];
    }
}
