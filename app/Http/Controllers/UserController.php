<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    public function data(Request $request)
    {
        $user = User::where('id', '!=', null);

        return datatables($user)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['edit'] = route('users.edit', ['user' => $row->id]);
                $act['delete'] = route('users.destroy', ['user' => $row->id]);
                $act['data'] = $row;


                return view('pages.admin.user.options', $act)->render();
            })
            ->escapeColumns([])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required|regex:/^[\pL\s]+$/u',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:8|confirmed',
                    'role' => 'required',
                ],

            );

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            return redirect()->route('users.index')->with('toast_success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('toast_error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate(
                [
                    'name' => 'required|regex:/^[\pL\s]+$/u',
                    'email' => 'required|email|unique:users,email,' . $id,
                    'password' => 'min:8|nullable|confirmed',
                    'role' => 'required',
                ],
            );

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password && $request->password_confirmation) {
                $user->password = Hash::make($request->password);
            }
            $user->role = $request->role;
            $user->save();
            return redirect()->route('users.index')->with('toast_success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('toast_error', 'Data gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->bookingList()->exists()) {
            return redirect()->route('users.index')->with('toast_error', 'Data tidak dapat dihapus');
        } else {
            $user->delete();
            return redirect()->route('users.index');
        }
    }
}
