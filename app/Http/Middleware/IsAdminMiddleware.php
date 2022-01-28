<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsAdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        // redirect a guest to the login screen
        if(!auth()->check()){
          return redirect(route('login'));
        }

        // TODO admin middleware as isAdmin
        // check if user had admin role
        if(!auth()->user()->isAdmin()){
          abort(403);
        }

        return $next($request);
    }
}
