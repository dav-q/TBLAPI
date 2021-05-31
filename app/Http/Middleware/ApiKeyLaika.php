<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyLaika
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
        // Si no existe el header o es vacio no autoriza la petición
        if (!($request->header('api-key-laika') && $request->header('api-key-laika') !== '')) {
            return response()->json('Unauthorized to laika API', 401, []);;
        }
        return $next($request);
    }
}
