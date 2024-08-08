<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow all origins
        $allowedOrigins = ['*'];

        // Allow specific origins
        // $allowedOrigins = ['http://example.com', 'http://anotherdomain.com'];

        $origin = $request->headers->get('Origin');

        if (in_array($origin, $allowedOrigins) || in_array('*', $allowedOrigins)) {
            header('Access-Control-Allow-Origin: ' . $origin);
        }

        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Authorization, Origin');

        // If the request is an OPTIONS request, return a response with the CORS headers
        if ($request->getMethod() === 'OPTIONS') {
            return response()->json([], 200);
        }

        return $next($request);
    }
}
