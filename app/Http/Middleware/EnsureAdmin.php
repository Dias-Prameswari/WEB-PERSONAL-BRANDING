<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $allowed = array_filter(config('admin.emails', [])); // dari config/admin.php
        if (! $request->user() || ! in_array($request->user()->email, $allowed, true)) {
            abort(403, 'Akses khusus admin');
        }
        return $next($request);
    }
}
