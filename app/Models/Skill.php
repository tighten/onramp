<?php

namespace App\Models;

use App\Completable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class Skill extends Model implements Completable
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function completions(): MorphMany
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    protected function casts(): array
    {
        return [
            'is_bonus' => 'boolean',
        ];
    }
}
