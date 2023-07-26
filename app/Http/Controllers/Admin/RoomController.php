<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['room'] = Room::orderBy('id');
        return view('pages.admin.rooms.index');
    }

    public function data(Request $request)
    {
        $room = Room::where('id', '!=', null)->orderBy('created_at', 'desc');


        if ($request->capacity) {
            $room->where('capacity', $request->capacity);
        }

        return datatables($room)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['edit'] = route('room.edit', ['room' => $row->id]);
                $act['delete'] = route('room.destroy', ['room' => $row->id]);
                $act['data'] = $row;
                return view('pages.admin.rooms.options', $act)->render();
            })
            ->escapeColumns([])
            ->make(true);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.rooms.create');
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
                    'room_name' => 'required|string',
                    'facility' => 'required|string',
                    'capacity' => 'required|numeric',
                    'availability' => 'required',
                ],
                [],

            );

            $room = new Room;
            $room->room_name = $request->room_name;
            $room->facility = $request->facility;
            $room->capacity = $request->capacity;
            $room->availability = $request->availability;
            $room->save();


            return redirect()->route('room.index')->with('toast_success', 'Data berhasil disimpan.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('room.index')->with('toast_error', 'Data gagal disimpan!');
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
        $room = Room::find($id);
        return view('pages.admin.rooms.edit', compact('room'));
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
                    'room_name' => 'required|regex:/^[\pL\s]+$/u',
                    'facility' => 'required',
                    'capacity' => 'required|numeric',
                    'availability' => 'required',
                ],
                [],

            );

            $room = Room::find($id);
            $room->room_name = $request->room_name;
            $room->facility = $request->facility;
            $room->capacity = $request->capacity;
            $room->availability = $request->availability;
            $room->save();


            return redirect()->route('room.index')->with('toast_success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('room.index')->with('toast_error', 'Data gagal disimpan!');
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
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Data berhasil dihapus.');
    }
}
