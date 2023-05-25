<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FizMiddleware
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
        $user = Auth::user();
        if($user && Auth::user()->user_role($user->id) == 'fiz')
        {
            return $next($request);
        }
        else
        {
            //return redirect()->back();
            return redirect('/login');
        }
    }
}
