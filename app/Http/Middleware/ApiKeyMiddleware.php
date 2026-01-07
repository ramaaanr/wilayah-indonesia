<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $key = $request->header('X-API-KEY');
        $allowedKeys = explode(',', env('ALLOWED_API_KEYS', ''));

        if (!in_array($key, $allowedKeys)) {
            return ResponseFormatter::error(
                null,
                'Akses ditolak. API key tidak valid atau tidak disediakan.',
                401
            );
        }

        return $next($request);
    }
}
