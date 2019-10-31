<?php

namespace App;

use App\Completable;
use App\Completion;
use App\Module;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model implements Completable
{
    protected $guarded = ['id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function completions()
    {
        return $this->morphMany(Completion::class, 'completable');
    }

    public function scopeForUser($query, $user = null)
    {
        if (!isset($user)) {
            return $query;
        }
        // user would be $user or auth()->user() if $user null
        // get the user's language and preference, and only select appropriate resources
        // @todo make this actually function
        // $language = locale();
        // $preference = enum('only current', 'only english', 'english and current')
        $preference = 'only-current'; // @todo pull from user's preferences or whatever

        switch ($preference) {
            case 'only-current':
                $query->where('language', locale());
        }

        if ($user->os != OperatingSystem::ANY) {
            $query->whereIn('os', [OperatingSystem::ANY, $user->os]);
        }
    }
}
