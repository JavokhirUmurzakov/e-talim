<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MVAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::user() == null || Auth::user()->permission == null || Auth::user()->permission->role == null){
            return redirect('/login');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "mv_admin"){
//            dd($request->all());
            return $next($request);
        }
        else {
            abort(404, 'NOT FOUND');
        }
    }
}
