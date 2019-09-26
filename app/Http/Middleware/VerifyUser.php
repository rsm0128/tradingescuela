<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyUser
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
        $user = User::findOrFail(Auth::user()->id);

        if ($user->email_status != 1) {
            return redirect()->route('email-verify');
        }
        if ($user->phone_status != 1) {
            return redirect()->route('phone-verify');
        }
        if ($user->status == 1){
            session()->flash('message','Your Account Is Block Now. Contact To Admin.');
            Auth::guard()->logout();
            session()->flash('type','success');
            return redirect('/login');
        }

        return $next($request);
    }
}
