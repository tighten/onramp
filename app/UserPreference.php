<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'language' => 'integer',
    ];

    public function languagePreferences()
    {
          return [
            'only-current' => __('Only current'),
            'only-english' => __('Only English'),
            'english-and-current' => __('English and current'),
        ];
    }
}
