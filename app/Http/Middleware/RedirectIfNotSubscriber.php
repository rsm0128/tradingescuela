<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfNotSubscriber
{
    public function handle($request, Closure $next, $guard="subscriber")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('subscriber.login'));
        }
        return $next($request);
    }
}