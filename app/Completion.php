<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function completable()
    {
        return $this->morphTo();
    }
}
