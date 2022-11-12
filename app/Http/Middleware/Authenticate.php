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
            return redirect(route('login'),302,[],true);
            return route('jsonResponse');
        }
        else{
            redirect(route('tt'),302,[],true);
        }
    }
}
