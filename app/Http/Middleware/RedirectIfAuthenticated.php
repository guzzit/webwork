<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    { 

        switch ($guard) {
            case 'employee':
              if (Auth::guard($guard)->check()) {
                //return redirect()->route('posts');
                return redirect('/posts');
              }
              break;
            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/posts');
              }
              break;
          }
       // dd(Auth::guard($guard));
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        return $next($request);
    }
}
