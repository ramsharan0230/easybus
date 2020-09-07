<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRole = auth()->user()->role;
        if($userRole=='admin'){
            return $next($request);
        }
        return redirect()->route('dashboard.index')->with('message','You dont have access');
    }
}
