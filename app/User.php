<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function completions()
    {
        return $this->hasMany(Completion::class);
    }

    public function complete($data)
    {
        return $this->completions()->create([
            'completable_id' => $data->id,
            'completable_type' => get_class($data),
        ]);
    }

    public function undoComplete()
    {
        // @todo
    }
}
