<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Auth\Middleware\DemoMiddleware as Middleware;
use Symfony\Component\HttpFoundation\Response;

class DemoMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next, string $test): Response 
    {
        if($request['id'] <50){
            dd($test);
            exit;
            return redirect('/');
        }
        return $next($request);
    }
    public function terminal(Request $request, Closure $next){
        
    }
}
