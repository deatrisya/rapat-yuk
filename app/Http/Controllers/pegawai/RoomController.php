<?php

namespace App\Http\Controllers\pegawai;
use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $book_lists = BookingList::select('description', 'start_time', 'end_time', 'date')->get();
        $events = $book_lists->map(function ($book_list){
            $time = [
                'time_start' => $book_list->start_time,
                'time_end' => $book_list->end_time,
            ];
            $start_date = $book_list->date."T".$time['time_start']."Z";
            $end_date = $book_list->date."T".$time['time_end']."Z";
            return [
                'title' => $book_list->description,
                'start' => $start_date,
                'end' => $end_date,
            ];
        });
        return view('pages.pegawai.rooms.index', compact('events'));
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
