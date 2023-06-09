<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                if(Auth::user()->user_type == 'Admin')
                {
                    if(Auth::user()->changed_pass == '1')
                    {
                        return redirect()->route('adminDashboard');
                    }
                    else
                    return redirect()->route('firstTime')
                    ->with('fail','Password Change required for First Time Log In');
                }
                else if(Auth::user()->user_type == 'Faculty')
                {
                    if(Auth::user()->changed_pass == '1')
                    {
                        return redirect()->route('facultyDashboard');
                    }
                    else
                    return redirect()->route('firstTime')
                    ->with('fail','Password Change required for First Time Log In');
                    
                }
                else if(Auth::user()->user_type == 'Student')
                {
                    if(Auth::user()->changed_pass == '1')
                    {
                        return redirect()->route('studentDashboard');
                    }
                    else
                    return redirect()->route('firstTime')
                    ->with('fail','Password Change required for First Time Log In');
                }
                
            }
        }

        return $next($request);
    }
}
