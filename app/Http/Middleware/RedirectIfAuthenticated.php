<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? null : $guards[0];

        if (Auth::guard($guards)->check()) {
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'pegawai':
                    return redirect('/pegawai/dashboard');
                default:
                    return redirect('/home');
            }
        }

        return $next($request);
    }
}
