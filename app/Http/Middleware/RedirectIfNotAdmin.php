<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfNotAdmin
{
    public function handle($request, Closure $next, $guard="admin")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('admin.login'));
        }
        return $next($request);
    }
}