<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        return $next($request);
    }
}
