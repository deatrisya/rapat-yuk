<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\User;


class DashboardController extends Controller
{
    //
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = User::where('role', 'pegawai')->get();
        return view('pages.pegawai.dashboard', compact('roles'));
    }
}
