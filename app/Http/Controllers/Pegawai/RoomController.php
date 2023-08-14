<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
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
        $room = Room::select('rooms.*', 'booking_lists.status', 'booking_lists.start_time', 'booking_lists.end_time')
            ->leftJoin(
                'booking_lists',
                function ($leftJoin) {
                    $leftJoin->on('booking_lists.room_id', '=', 'rooms.id')
                        ->whereDate('booking_lists.date', '=', Carbon::now())
                        ->whereIn('booking_lists.status', ['DISETUJUI', 'DIGUNAKAN', 'SELESAI']);
                }
            )->groupBy('rooms.id');
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
            ->addColumn('jadwal_booking', function ($row) {
                if ($row->status === 'DISETUJUI' || $row->status === 'DIGUNAKAN') {
                    $schedules = BookingList::where('room_id', $row->id)
                        ->whereDate('date', Carbon::now())
                        ->whereIn('status', ['DISETUJUI', 'DIGUNAKAN'])
                        ->get();

                    $scheduleStrings = [];
                    foreach ($schedules as $schedule) {
                        $startTime = Carbon::parse($schedule->start_time)->format('H:i');
                        $endTime = Carbon::parse($schedule->end_time)->format('H:i');
                        $scheduleStrings[] = "{$startTime} - {$endTime}";
                    }

                    return implode('<br>', $scheduleStrings);
                } else {
                    return '-';
                }
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
                        ->whereIn('booking_lists.status', ['DISETUJUI', 'DIGUNAKAN', 'SELESAI']);
                }
            )->where('rooms.id', '=', $id)
            ->firstOrFail();

//$book_list = $room->booking()->get();
        $events = BookingList::selectRaw('booking_lists.*, rooms.room_name')
        ->join('rooms', 'rooms.id', '=', 'booking_lists.room_id')
        ->whereIn('status', ['DISETUJUI', 'DIGUNAKAN', 'SELESAI'])
        ->where('booking_lists.room_id', $id)
        ->get()
        ->map(function ($book_list) {
            $startTime = Carbon::parse($book_list->date . $book_list->start_time);
            $endTime = Carbon::parse($book_list->date . $book_list->end_time);
            return [
                'start' => $startTime->toIso8601String(),
                'end' => $endTime->toIso8601String(),
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
