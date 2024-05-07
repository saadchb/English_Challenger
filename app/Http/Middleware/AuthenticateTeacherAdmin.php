<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateTeacherAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('teacher')->check()) {
            if(Auth::guard('teacher')->user()->isAdmin == 1){
                return $next($request);
            }elseif(Auth::guard('teacher')->user()->isAdmin == 0){
                return $next($request);
            }else{
                abort(403);
            }
        }else{
            abort(403);
        }

    }
}
