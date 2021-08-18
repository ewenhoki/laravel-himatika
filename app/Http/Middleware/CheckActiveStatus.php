<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Webstatus;

class CheckActiveStatus
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
        $value = Webstatus::find(1); // assuming value is either 0 or 1
        if ($value->status != 1) {
            return redirect()->route('status.locked'); // view with 404 display error
        }

        return $next($request);
    }
}
