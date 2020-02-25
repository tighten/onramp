<?php

namespace App\Http\Middleware;

use App\Facades\Preferences;
use Closure;

class CheckTrackAssigned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if(!auth()->user()->track) {
                $request->session()->flash('prompt_user_set_track');
            }else {
                $request->session()->forget('prompt_user_set_track');
            }
        }

        return $next($request);
    }
}
