<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistory
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
        return $next($request);

        //  $response = $next($request);
        // return $response->header('Cache-control','nocache,no-store,max-age=0;must-revalidate')
        //                 ->header('Progma','no-cache')
        //                 ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    }
}