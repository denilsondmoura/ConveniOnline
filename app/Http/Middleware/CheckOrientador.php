<?php

namespace App\Http\Middleware;

use Closure;

class CheckOrientador
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
        session_start();
        if ($_SESSION["tipo"]) {

            if ($_SESSION["tipo"] === 'orien') {
                return $next($request);   
            }    
        } 
        
         return redirect('login');
    }
}
