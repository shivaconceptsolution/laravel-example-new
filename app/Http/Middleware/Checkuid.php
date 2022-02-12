<?php

namespace App\Http\Middleware;

use Closure;

class Checkuid
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
        if($request->uid == "admin")
        {
        echo "Valid userid";
        }
        else
        {
            echo "Invalid Userid";
        }

        return $next($request);
    }
}
