<?php

namespace App\Http\Middleware;

use Closure;

class Assistant
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
        if($userRole=='assistant'){
            return $next($request);
        }
        return redirect()->back()->with('message','You dont have admin access');
    }
}
