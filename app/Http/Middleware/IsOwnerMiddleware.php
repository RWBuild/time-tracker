<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsOwnerMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        // check if is auth
        if(!auth()->check()){
            return redirect(route('login'));
        }

        // check if is owner
        if(!auth()->user()->isOwner()){
           abort(403);
        }

        return $next($request);
    }
}
