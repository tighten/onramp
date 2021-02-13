<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Skill extends Model implements Completable
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];

    protected $casts = [
        'is_bonus' => 'boolean',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function completions()
    {
        return $this->morphMany(Completion::class, 'completable');
    }
}
