<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

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
        return view('pages.admin.dashboard', compact('roles'));
    }
    // public function showRole()
    // {
    // }
}
