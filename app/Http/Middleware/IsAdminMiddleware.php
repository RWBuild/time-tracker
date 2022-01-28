<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;


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
        //redirect guest to login screen 
        if(!auth()->check())
        {
            return redirect(route('login'));
        }
        //check if user is admin
        if(!auth()->user()->isAdmin())
        {
            abort(403);
        }
        return $next($request);
    }
}
