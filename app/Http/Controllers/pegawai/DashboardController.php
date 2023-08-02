<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\Room;
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
        $roles = User::where('role', 'pegawai')->get();
        $jumlahPesanan = BookingList::where('status', '=', 'PENDING')->count();
        $jumlahKetersediaan = DB::table('rooms')
            ->leftJoin('booking_lists', function ($leftJoin) {
                $leftJoin->on('booking_lists.room_id', '=', 'rooms.id')
                    ->whereDate('booking_lists.date', '=', Carbon::now())
                    ->whereIn('booking_lists.status', ['DISETUJUI', 'DIGUNAKAN']);
            })
            ->whereNull('booking_lists.room_id')
            ->count();
        $book_lists = BookingList::select('description', 'start_time', 'end_time', 'date')->get();

        $events = $book_lists->map(function ($book_list) {
            $time = [
                'time_start' => $book_list->start_time,
                'time_end' => $book_list->end_time,
            ];
            $start_date = $book_list->date . "T" . $time['time_start'] . "Z";
            $end_date = $book_list->date . "T" . $time['time_end'] . "Z";
            return [
                'title' => $book_list->description,
                'start' => $start_date,
                'end' => $end_date,
            ];
        });
        //Alert::toast('Selamat datang! 🙇‍♂️', 'success')->position('top-end')->autoClose(5000);
        return view('pages.pegawai.dashboard', compact('roles', 'jumlahPesanan', 'events', 'jumlahKetersediaan'));
    }
}
