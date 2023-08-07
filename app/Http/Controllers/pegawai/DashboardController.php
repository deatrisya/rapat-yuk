<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = User::where('role', 'Pegawai')->get();
        $jumlahPesanan = BookingList::where('status', '=', 'PENDING')->count();
        $jumlahKetersediaan = DB::table('rooms')
            ->leftJoin('booking_lists', function ($leftJoin) {
                $leftJoin->on('booking_lists.room_id', '=', 'rooms.id')
                    ->whereDate('booking_lists.date', '=', Carbon::now())
                    ->whereIn('booking_lists.status', ['DISETUJUI', 'DIGUNAKAN']);
            })
            ->whereNull('booking_lists.room_id')
            ->count();

            $events = BookingList::selectRaw('booking_lists.*, rooms.room_name')
            ->join('rooms','rooms.id','=','booking_lists.room_id')
            ->where('status', 'DISETUJUI') // Memuat data ruang melalui relasi
            ->get()
            ->map(function ($book_list) {
                $startTime = Carbon::parse($book_list->date.$book_list->start_time);
                $endTime = Carbon::parse($book_list->date.$book_list->end_time);
                $room_book = $book_list->rooms ? $book_list->rooms->room_name : null;
                return [
                    'room' => $room_book,
                    'title' => $book_list->description,
                    'start' => $startTime->toIso8601String(),
                    'end' => $endTime->toIso8601String(),
                ];
            });
        //Alert::toast('Selamat datang! 🙇‍♂️', 'success')->position('top-end')->autoClose(5000);
        return view('pages.pegawai.dashboard', compact('roles', 'jumlahPesanan', 'events', 'jumlahKetersediaan'));
    }
}
