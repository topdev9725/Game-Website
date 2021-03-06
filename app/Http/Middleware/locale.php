<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class locale
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
        App::setLocale(Session::get('lang'));
        return $next($request);
    }
}
