<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Active
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
        $user = auth()->user();
        //dd($user);
        if($user){
            if(!$user->active){
                auth()->logout();
                return redirect(route('login'));
            }
        }else{
            return redirect(route('login'));
        }
        return $next($request);
    }
}
