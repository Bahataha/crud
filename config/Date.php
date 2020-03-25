<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class Date
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
        $myTime = Carbon::now();
        if($myTime > "2020-12-03 00:00:00") {  // datetime
            return $next($request);
        }
        return redirect('/restrict');
    }
}
