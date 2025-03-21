<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Faol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() == null || Auth::user()->faol == null || Auth::user()->faol == false){
            return redirect('/faol');
        }
        elseif(Auth::user()->faol == true){
            return $next($request);
        }
        else {
            abort(404, 'NOT FOUND');
        }

    }
}
