<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfNotSubAdmin
{
    public function handle($request, Closure $next, $guard="subadmin")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('subadmin.login'));
        }
        return $next($request);
    }
}