<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        // jika request tidak sesuai ekspektasi json, return to login
        if (! $request->expectsJson()) {
            return route('login');
        }

        // redirect to homepage after login
        return route('index');
    }
}
