<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        Alert::toast('Selamat datang! 🙇‍♂️', 'success')->position('top-end')->autoClose(5000);
        return view('pages.admin.dashboard', compact('roles'));
    }
    // public function showRole()
    // {
    // }
}
