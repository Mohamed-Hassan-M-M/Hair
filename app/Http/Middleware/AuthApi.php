<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    'status' => false,
                    'msg' => '404 error',
                    'data' => 'Unauthenticated'
                ]);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json([
                'status' => false,
                'msg' => 'token_expired',
                'data' => $e->getStatusCode()
            ]);
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json([
                'status' => false,
                'msg' => 'token_invalid',
                'data' => $e->getStatusCode()
            ]);
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'status' => false,
                'msg' => 'token_absent',
                'data' => $e->getStatusCode()
            ]);
        }
        return $next($request);
    }
}
