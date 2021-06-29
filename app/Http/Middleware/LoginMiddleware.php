<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class LoginMiddleware
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
        if (!Session::has('user_id')) {
            return redirect('login');
        }

        return $next($request);
    }
}
