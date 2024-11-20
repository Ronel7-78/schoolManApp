<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckAdminSessions
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $activeSessions = DB::table('sessions')
                ->where('user_id', Auth::id())
                ->count();

            if ($activeSessions > 1) {
                Auth::logout();
                return redirect('/connexion')->with('error', 'Un autre admin est déjà connecté. Veuillez réessayer plus tard.');
            }
        }

        return $next($request);
    }
}
