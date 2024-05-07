<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is(app()->getLocale() . '/')) {
                return route('selection');
            }
            elseif(Request::is(app()->getLocale() . '/dashboard')) {
                return route('selection');
            }

            else {
                return route('selection');
            }
        }
    }
}
