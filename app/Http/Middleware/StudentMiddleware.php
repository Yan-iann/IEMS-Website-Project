<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->user_type == 'Student')
            {
                    return $next($request);
            }
            else
            {
                return redirect()->back()
                ->with('fail','Access Denied! You are not a Student');
            }

        }
        else
        {
            return redirect()->back()
            ->with('fail','Access Denied! Please Log-in First');
        }
        return $next($request);
    }
}
