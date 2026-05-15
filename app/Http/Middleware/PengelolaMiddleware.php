<?php

namespace App\Http\Middleware;

use Closure;

class PengelolaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'pengelola') {
            return $next($request);
        }

        abort(403, 'Akses hanya untuk pengelola.');
    }
}