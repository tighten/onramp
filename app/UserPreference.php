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
            __('Only current'),
            __('Only English'),
            __('English and current'),
        ];
    }
}
