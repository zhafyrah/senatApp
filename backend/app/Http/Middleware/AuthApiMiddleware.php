<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class AuthApiMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = (int) $request->header('userId'); // will replace with JWT
        if ($userId === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Data Login Tidak Valid, Silahkan Lakukan Login Ulang'
            ]);
        }

        return $next($request);
    }
}
