<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Term extends Model
{
    use HasTranslations;

    protected $guarded = ['id'];

    public $translatable = ['name', 'description'];

    public function getEnglishName()
    {
        return $this->getTranslation('name', 'en');
    }
}
