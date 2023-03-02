<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Term extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'description'];

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::addGlobalScope('name_sort', function (Builder $builder) {
            $builder->orderBy('name->en');
        });
    }

    public function getEnglishName()
    {
        return $this->getTranslation('name', 'en');
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class)->withTimestamps();
    }

    public function resourcesForCurrentSession()
    {
        return $this->resources()->forCurrentSession();
    }

    public function relatedTerms()
    {
        return $this->belongsToMany(Term::class, 'term_term', 'term_id', 'related_term_id');
    }
}
