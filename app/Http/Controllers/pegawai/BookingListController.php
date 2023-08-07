<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pegawai.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = Room::all();
        return view('pages.pegawai.booking.create', compact('room'));
    }
    public function data(Request $request)
    {
        $user = auth()->user();
        $booking = BookingList::selectRaw('booking_lists.*, rooms.room_name as room_name')
            ->join('rooms', 'rooms.id', '=', 'booking_lists.room_id')
            ->where('booking_lists.user_id', $user->id)
            ->orderByDesc('booking_lists.created_at')
            ->get();


        return datatables($booking)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['edit'] = route('booking.edit', ['booking' => $row->id]);
                $act['show'] = route('booking.show', ['booking' => $row->id]);
                $act['data'] = $row;

                return view('pages.pegawai.booking.options', $act)->render();
            })
            ->editColumn('room_name', function ($room) {
                return $room->room_name;
            })
            ->addColumn('photo', function ($photo_book) {
                if ($photo_book->photo !== null) {
                    return '<img src="' . asset('storage/' . $photo_book->photo) . '"' . 'alt="foto" width="100px" height="100px">';
                } else {
                    return '-';
                }
            })
            ->editColumn('date', function ($date) {
                $formatDate = Carbon::createFromFormat('Y-m-d', $date->date)->format('d-m-Y');
                return $formatDate;
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
            $validator = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required',
                    'date' => 'required|date',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'qty_participants' => 'required|integer',
                    'food' => 'required|integer',
                    'description' => 'required|string',
                ],
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $bookingDateTime = $request->date . ' ' . $request->start_time;

            if (Carbon::parse($bookingDateTime)->lt(Carbon::now())) {
                return redirect()->back()->with('toast_error', 'Tanggal atau waktu booking harus lebih dari waktu saat ini hari ini.')->withInput();
            }

            $booking = new BookingList;
            $booking->room_id = $request->room_id;
            $booking->user_id = $request->user_id;
            $booking->date = $request->date;
            $booking->start_time = $request->start_time;
            $booking->end_time = $request->end_time;
            $booking->qty_participants = $request->qty_participants;
            $booking->food = $request->food;
            $booking->description = $request->description;
            $booking->status = 'Pending';
            $booking->save();
            return redirect()->route('booking.index')->with('toast_success', 'Booking Berhasil');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('toast_error', 'Booking Gagal');
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
        $booking =  BookingList::find($id);
        $room = Room::all();
        return view('pages.pegawai.booking.detail', compact('booking', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = BookingList::find($id);
        $room = Room::all();
        return view('pages.pegawai.booking.edit', compact('booking', 'room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $booking = BookingList::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();
        return redirect()->route('booking.index');
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'date' => 'required|date',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'qty_participants' => 'required|integer',
                    'food' => 'required|integer',
                    'description' => 'required|string',
                ],
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $bookingDateTime = $request->date . ' ' . $request->start_time;

            if (Carbon::parse($bookingDateTime)->lt(Carbon::now())) {
                return redirect()->back()->with('toast_error', 'Tanggal atau waktu booking harus lebih dari waktu saat ini hari ini.')->withInput();
            }
            $booking = BookingList::findOrFail($id);
            $booking->room_id = $request->room_id;
            $booking->date = $request->date;
            $booking->start_time = $request->start_time;
            $booking->end_time = $request->end_time;
            $booking->qty_participants = $request->qty_participants;
            $booking->food = $request->food;
            $booking->description = $request->description;

            if ($request->hasFile('photo')) {
                $request->validate(
                    [
                        'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    ]
                );
                if ($booking->photo && file_exists(storage_path('app/public/' . $booking->photo))) {
                    Storage::delete('public/' . $booking->photo);
                }
                $image_name = $request->file('photo')->store('photo', 'public');
                $booking->photo = $image_name;
            }
            if ($request->resume) {
                $booking->resume = $request->resume;
            }

            $booking->save();
            return redirect()->route('booking.index')->with('toast_success', 'Booking Berhasil Diperbarui');
        } catch (\Throwable $e) {
            throw $e;
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
        //
    }
}
