<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Term extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'description'];

    protected $guarded = ['id'];

    public function getEnglishName()
    {
        return $this->getTranslation('name', 'en');
    }
}
