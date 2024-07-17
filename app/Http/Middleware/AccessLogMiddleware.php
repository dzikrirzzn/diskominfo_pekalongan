<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AccessLog;

class LogAccess
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->route()) {
            AccessLog::create([
                'page' => $request->route()->getName(),
                'accessed_at' => now(),
            ]);
        }

        return $next($request);
    }
}