<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $request->api_password !== 'hair@1phase_api'){
            return response()->json(['message' => 'Unauthenticated.']);
        }
        return $next($request);
    }
}
