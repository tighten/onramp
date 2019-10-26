<?php

namespace App;

use App\Completable;
use App\Preferences;
use App\Track;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $preferences;

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'preferences' => 'object',
    ];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function completions()
    {
        return $this->hasMany(Completion::class);
    }

    public function complete(Completable $completable)
    {
        return $this->completions()->create([
            'completable_id' => $completable->getKey(),
            'completable_type' => $completable->getMorphClass(),
        ]);
    }

    public function undoComplete($completable)
    {
        return $this->completions()->where([
            'completable_id' => $completable->getKey(),
            'completable_type' => $completable->getMorphClass(),
        ])->delete();
    }

    public function moduleCompletions()
    {
        return $this->completions()->modules();
    }

    public function resourceCompletions()
    {
        return $this->completions()->resources();
    }

    public function skillCompletions()
    {
        return $this->completions()->skills();
    }

    public function preferences()
    {
        return $this->preferences ?? new Preferences($this);
    }
}
