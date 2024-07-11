<?php

use Closure;
use Illuminate\Http\Request;
use App\Models\AccessLog;

class AccessLogMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $page = $request->path();
        $accessLog = AccessLog::where('page', $page)->first();
        
        if ($accessLog) {
            $accessLog->increment('access_count');
        } else {
            AccessLog::create(['page' => $page]);
        }

        return $next($request);
    }
}