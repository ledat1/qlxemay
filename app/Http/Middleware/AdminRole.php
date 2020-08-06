<?php

namespace App\Http\Middleware;
const ROLE_ADMIN = 1;
const ROLE_USER = 2;
use Closure;

class AdminRole
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
        echo $request->user()->id_role;
        if($request->user()->id_role != ROLE_ADMIN){
            return redirect('/login');
        }
        return $next($request);
    }
}
