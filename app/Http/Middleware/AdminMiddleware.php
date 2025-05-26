<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    //alleen voor admin-gebruikers dus checkpoint hier 
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        if (! $request->user() || ! $request->user()->is_admin) {
            abort(403, 'Je hebt geen toegang tot dit gedeelte.');
        }

        return $next($request);
    }
}
