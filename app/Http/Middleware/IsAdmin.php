<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Apabila user belum login dan user yg login bukan AcilRestu12
        // if ( auth()->guest() || auth()->user()->username !== 'AcilRestu12' ) {
        //     abort(403);
        // }

        // Apabila user belum login dan user yg login bukan admin
        if ( !auth()->check() || !auth()->user()->is_admin ) {
            abort(403);
        }
        
        return $next($request);
    }
}
