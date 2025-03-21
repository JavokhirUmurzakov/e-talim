<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class OhtmUqituvchi
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
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_uqituvchi"){
//            dd($request->all());
            return $next($request);
        }
        else {
            abort(404, 'NOT FOUND');
        }
    }
}
