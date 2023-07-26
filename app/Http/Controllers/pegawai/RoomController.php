<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pegawai.rooms.index');
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
               $act['show'] = route('room-pegawai.show',['room_pegawai'=>$row->id]);
                $act['data'] = $row;
                return view('pages.pegawai.rooms.options', $act)->render();
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        $facilities = explode(', ', $room->facility);
        return view('pages.pegawai.rooms.read', compact('room', 'facilities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
