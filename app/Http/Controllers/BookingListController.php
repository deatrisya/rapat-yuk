<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;

class BookingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = BookingList::all();
        $from_date = Carbon::now()->startOfMonth()->format('Y-m-d');
        $to_date = Carbon::now()->endOfMonth()->format('Y-m-d');
        return view('pages.admin.booking.index', compact('booking', 'from_date', 'to_date'));
    }

    public function data(Request $request)
    {
        $booking = BookingList::selectRaw('booking_lists.*, users.name as user_name, rooms.room_name as room_name')
            ->join('users', 'users.id', '=', 'booking_lists.user_id')
            ->join('rooms', 'rooms.id', '=', 'booking_lists.room_id');

        if ($request->from_date) {
            $booking->whereDate('booking_lists.date', '>=', Carbon::parse($request->from_date));
        }
        if ($request->to_date) {
            $booking->whereDate('booking_lists.date', '<=', Carbon::parse($request->to_date));
        }
        if ($request->status) {
            $booking->where('booking_lists.status', $request->status);
        }

        return datatables($booking)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['show'] = route('bookings.show', ['booking' => $row->id]);
                $act['data'] = $row;

                return view('pages.admin.booking.options', $act)->render();
            })
            ->editColumn('user_name', function ($user) {
                return $user->user_name;
            })
            ->editColumn('room_name', function ($room) {
                return $room->room_name;
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
        //
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
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = BookingList::findOrFail($id);
        $start_time = new DateTime($booking->start_time);
        $end_time = new DateTime($booking->end_time);
        $duration = $start_time->diff($end_time)->format('%H:%I');
        return view('pages.admin.booking.detail', compact('booking', 'duration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = BookingList::findOrFail($id);
        return view('pages.admin.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $booking = BookingList::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();
        return redirect()->route('bookings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = BookingList::find($id);
        $booking->delete();

        return response()->json(['success' => true]);
    }
}
