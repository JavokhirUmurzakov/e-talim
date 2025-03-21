<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OhtmFakKafBoshliq
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check() || is_null(auth()->user()) || !isset(auth()->user()->uqituvchi) || !isset(auth()->user()->uqituvchi->rahbar) || !auth()->user()->uqituvchi->rahbar)
            return abort('404', 'not_found');

        return $next($request);
    }
}
