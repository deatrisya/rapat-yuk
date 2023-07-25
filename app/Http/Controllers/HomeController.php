<?php

namespace App\Http\Controllers;





class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index()
    // {
    //     $role=Auth::User()->role;
    //     if ($role == 'admin') {
    //         return view('pages.admin.dashboard');
    //     }
    //     elseif ($role == 'pegawai') {
    //         return view('pages.pegawai.dashboard');
    //     }
    //     else{
    //         return view('auth.login');
    //     }
    // }

    // /**
    //  * Summary of show
    //  * @param string $role
    //  * @return View
    //  */
    // public function show()
    // {
    //     // Mendapatkan data berdasarkan role 'admin'
    //     $admin = User::where('role', 'admin')->get();
    //     // Mendapatkan data berdasarkan role 'pegawai'
    //     $pegawai = User::where('role', 'pegawai')->get();
    //     return view('pages.admin.dashboard', compact('admin', 'pegawai'));
    // }
}
