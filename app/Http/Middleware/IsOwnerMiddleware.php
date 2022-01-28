<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsOwnerMiddleware
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

        // redirects if user is not owner
        if(!auth()->check()){
            return redirect(route('login'));
        }
        // If logegd in user is not Owner
        if(!auth()->user()->isOwner()){
            abort(403,'You are not Owner');
        }
        // if logged in user passes all checks
        return $next($request);
    }
}
