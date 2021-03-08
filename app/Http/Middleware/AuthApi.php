<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AuthApi extends BaseMiddleware
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
            $user = JWTAuth::parseToken()->authenticate();
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated',
                'data' => 'no or wrong token'
            ]);
        }
        return $next($request);
    }
}
