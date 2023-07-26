<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    public function index()
    {
        $roles = User::where('role', 'admin')->get();
        Session::flash('toast_message', 'Selamat datang! 🙇‍♂️');
        return view('pages.admin.dashboard', compact('roles'));
    }
}
