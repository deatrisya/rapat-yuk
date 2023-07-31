<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Carbon\Carbon;
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
        return view('pages.pegawai.rooms.index');
    }

    public function data(Request $request)
    {
        $room = Room::where('id', '!=', null)->orderBy('created_at', 'desc');
        $room = Room::selectRaw('rooms.*, booking_lists.status')
            ->leftJoin(
                'booking_lists',
                function ($leftJoin) {
                    $leftJoin->on('booking_lists.room_id', '=', 'rooms.id')
                        ->whereDate('booking_lists.date', '=', Carbon::now())
                        ->where('booking_lists.status', '=', 'DISETUJUI');
                }
            )->groupBy('rooms.id');
        // $room = Room::select('rooms.*', DB::raw('COUNT(booking_lists.id) as booking_count'))
        //     ->leftJoin(
        //         'booking_lists',
        //         function ($leftJoin) {
        //             $leftJoin->on('booking_lists.room_id', '=', 'rooms.id')
        //                 ->whereDate('booking_lists.date', '=', Carbon::now())
        //                 ->where('booking_lists.status', '=', 'DISETUJUI');
        //         }
        //     )->groupBy('rooms.id');
        if ($request->capacity) {
            $room->where('capacity', $request->capacity);
        }

        return datatables($room)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['show'] = route('room-pegawai.show', ['room_pegawai' => $row->id]);
                $act['data'] = $row;
                return view('pages.pegawai.rooms.options', $act)->render();
            })
            ->editColumn('availability', function ($statusRoom) {
                if ($statusRoom->status) {
                    $statusNow = 'Tidak Tersedia';
                } else {
                    $statusNow = 'Tersedia';
                }
                return $statusNow;
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
     */
    public function show($id)
    {
        // $room = Room::findOrFail($id);
        $room = Room::selectRaw('rooms.*, booking_lists.status')
            ->leftJoin(
                'booking_lists',
                function ($leftJoin) {
                    $leftJoin->on('booking_lists.room_id', '=', 'rooms.id')
                        ->whereDate('booking_lists.date', '=', Carbon::now())
                        ->where('booking_lists.status', '=', 'DISETUJUI');
                }
            )->where('rooms.id', '=', $id)
            ->firstOrFail();

        $book_list = $room->booking()->get();
        $events = $book_list->map(function ($book_list) {
            $startTime = Carbon::parse($book_list->date . $book_list->start_time);
            $endTime = Carbon::parse($book_list->date . $book_list->end_time);

            return [
                'title' => $book_list->description,
                'start' => $startTime->toISOString(), // Convert to ISO format for fullcalendar
                'end' => $endTime->toISOString(),
            ];
        });
        $facilities = explode(', ', $room->facility);
        return view('pages.pegawai.rooms.detail', compact('room', 'facilities', 'events'));
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
