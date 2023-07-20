<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhichHome
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
        if (Auth::user() && (Auth::user()->role == 'pegawai')) {
            return $next($request);
        }
        elseif (Auth::user() && (Auth::user()->role == 'admin')) {
            return redirect('/admin');
        }
        else {
            return response('Unauthorized. <a href="javascript:history.back()">Go Back</a>', 401);
        }
    }
}
