<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //redirect a guest to the login screen
        if (!auth()->check()) {
            return redirect(route('login'));
        }
        //if logged in user has admin role
        if(!auth()->user()->isAdmin()){
            abort(403,'You are not an admin');
        }
        //if logged in user passes all checks
        return $next($request);
    }
}
