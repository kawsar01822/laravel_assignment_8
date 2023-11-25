<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class demoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('token');
        if('123XYZ' == $token){
//            $request->headers->add(['email'=>'email@email.com']);         // Add data in header by middleware
//            $request->headers->replace(['email'=>'replace@email.com']);   // Replace data in header by middleware
//            $request->headers->remove('email');                           // Remove data from header by middleware
            return $next($request);
        }
        return response("unauthorized access",401);
    }
}
