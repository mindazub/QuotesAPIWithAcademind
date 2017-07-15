<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-type, Authorization');

        // Sprendimas i6 interneto, vistiek neveikia
        // return $next($request)
        // ->header("Access-Control-Expose-Headers", "Access-Control-*")
        // ->header("Access-Control-Allow-Headers", "Access-Control-*, Origin, X-Requested-With, Content-Type, Accept")
        // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS, HEAD')
        // ->header('Access-Control-Allow-Origin', '*')
        // ->header('Allow', 'GET, POST, PUT, DELETE, OPTIONS, HEAD');
        // var_dump('STOP');
    }
}
