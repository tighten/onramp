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

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    function resourcesForUser()
    {
        // get the user's language and preference, and only select appropriate resources
        // @todo make this actually function
        // $language = locale();
        // $preference = enum('only current', 'only english', 'english and current')
        $preference = 'only-current'; // @todo pull from user's preferences or whatever

        switch ($preference) {
            case 'only-current':
                return $this->resources()->where('language', locale())->get();
        }
    }
}
