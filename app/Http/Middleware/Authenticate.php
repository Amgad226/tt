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
        if (! $request->expectsJson()) {
            // return response('error from middelware');
            // dd($request->secure());
            // if (!$request->secure()) {
            //     return redirect()->secure($request->getRequestUri());
            //  }
            return route('login');
            return route('jsonResponse');
        }
    }
}
