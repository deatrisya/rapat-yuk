<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveRoom;
use App\Mail\RejectRoom;
use App\Models\BookingList;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $room = Room::all();
        $from_date = Carbon::now()->startOfMonth()->format('Y-m-d');
        $to_date = Carbon::now()->endOfMonth()->format('Y-m-d');
        return view('pages.admin.booking.index', compact('booking', 'from_date', 'to_date', 'room'));
    }

    public function data(Request $request)
    {
        $booking = BookingList::selectRaw('booking_lists.*, users.name as user_name, rooms.room_name as room_name, admin.name as admin_name')
            ->join('users', 'users.id', '=', 'booking_lists.user_id')
            ->join('rooms', 'rooms.id', '=', 'booking_lists.room_id')
            ->leftJoin('users as admin', 'admin.id', '=', 'booking_lists.admin_id')
            ->orderByDesc('booking_lists.created_at');

        if ($request->from_date) {
            $booking->whereDate('booking_lists.date', '>=', Carbon::parse($request->from_date));
        }
        if ($request->to_date) {
            $booking->whereDate('booking_lists.date', '<=', Carbon::parse($request->to_date));
        }
        if ($request->status) {
            $booking->where('booking_lists.status', $request->status);
        }
        if ($request->room) {
            $booking->where('booking_lists.room_id', $request->room);
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
            ->editColumn('date', function ($date) {
                $formatDate = Carbon::createFromFormat('Y-m-d', $date->date)->format('d-m-Y');
                return $formatDate;
            })
            ->editColumn('admin_name', function ($admin) {
                return $admin->admin_name ?? '-';
            })
            ->editColumn('online_meeting', function ($meeting) {
                if ($meeting->online_meeting) {
                    return 'Online';
                } else {
                    return 'Offline';
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
        $booking->admin_id = $request->admin_id;
        if ($request->status == "DISETUJUI") {
            $email_user = $booking->users->email;
            $receiver = $booking->users->name;
            $date_book = Carbon::parse($booking->date)->format('d/m/Y');
            $str_time_book = $booking->start_time;
            $end_time_book = $booking->end_time;
            $room_book = $booking->rooms->room_name;
            $participant = $booking->qty_participants;
            $consumption = $booking->food;
            $annotation = $booking->description;
            $admin_name = User::where('role', 'Admin')->pluck('name')->first();
            $MailApprove = [
                'title' => 'Pemberitahuan Konfirmasi Pemesanan Ruang Rapat' . ' - ' . $room_book . ' - ' . $date_book,
                'receiver' => $receiver,
                'date_book' => $date_book,
                'str_time_book' => $str_time_book,
                'end_time_book' => $end_time_book,
                'room_book' => $room_book,
                'total_participant' => $participant,
                'total_consumption' => $consumption,
                'annotation' => $annotation,
                'admin_name' => $admin_name
            ];
            Mail::to($email_user)->send(new ApproveRoom($MailApprove));
        } elseif ($request->status == "DITOLAK") {
            $booking->reason = $request->reason;
            // dd($booking->reason);
            $email_user = $booking->users->email;
            $receiver = $booking->users->name;
            $date_book = Carbon::parse($booking->date)->format('d/m/Y');
            $room_book = $booking->rooms->room_name;
            $MailReject = [
                'title' => 'Pemberitahuan Konfirmasi Pemesanan Ruang Rapat' . ' - ' . $room_book . ' - ' . $date_book,
                'receiver' => $receiver,
                'date_book' => $date_book,
            ];
            Mail::to($email_user)->send(new RejectRoom($MailReject));
        }
        $booking->save();

        return redirect()->route('bookings.index');
    }

    public function updateLink(Request $request, $id)
    {
        $request->validate([
            'link_zoom' => 'nullable|url', // Validasi input sebagai tautan
        ]);

        $booking = BookingList::findOrFail($id);
        $booking->link_zoom = $request->link_zoom;
        $booking->save();
        return redirect()->route('bookings.index')->with('toast_success', 'Link Zoom Berhasil Ditambahkan');
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

    public function downloadFile($id)
    {
        $booking = BookingList::findOrFail($id);
        if ($booking->resume) {
            $path = storage_path('app/public/' . $booking->resume);
            return response()->download($path, 'Dokumen Rapat_' . $booking->date . '.' . pathinfo($path, PATHINFO_EXTENSION));
        }
        return back()->with('toast_error', 'Dokumen tidak ditemukan.');
    }
}
