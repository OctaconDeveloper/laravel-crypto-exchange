<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
        if(!auth()->user()){
            return redirect('/401');
        }else{
            if(auth()->user()->user_type_id !== 1){
                return redirect('/403');
            }else{
                return $next($request);
            }
        }
    }
}
