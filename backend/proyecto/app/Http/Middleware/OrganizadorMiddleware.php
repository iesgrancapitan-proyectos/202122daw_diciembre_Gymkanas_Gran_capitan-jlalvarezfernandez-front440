<?php

namespace App\Http\Middleware;

use Closure;

class OrganizadorMiddleware{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (auth()->check() && auth()->user()->perfil == 'organizador'){
            return $next($request);
        }

        return redirect('/');
    }
}