<?php

namespace AlumSpot\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfAlumniAuthenticated
{
    /**
     * Handle an incoming request.
     * Redirects alumni if they are
     * already authenticated and try to go to login
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //first check if user is logged in coach
        if (Auth::guard()->check()) {
              return redirect('/coach/home');
          }

          //If request comes from logged in alumni, he will
          //be redirected to alumni's home page.
          if (Auth::guard('alumni')->check()) {
              return redirect('/alumni/home');
          }
          return $next($request);
      }
}
