<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
       $guards = empty($guards) ? [null] : $guards;

       foreach ($guards as $guard) {
           if (Auth::guard($guard)->check()) {
               $user = Auth::guard($guard)->user();

               if ($user->is_admin) {
                   return redirect()->route('admin.dashboard'); // Admin route
               }

               return redirect()->route('dashboard'); //  user route
           }
       }

       return $next($request);
    }

}
