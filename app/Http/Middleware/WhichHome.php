<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

            return redirect('/dashboard');
        }
        elseif (Auth::user() && (Auth::user()->role == 'admin')) {
            //Alert::success(session('success'));
            return redirect('/admin');
        }
        else {
            Alert::error(session('error'));
            return response('Unauthorized. <a href="javascript:history.back()">Go Back</a>', 401);
        }
    }
}
