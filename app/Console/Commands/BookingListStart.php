<?php

namespace App\Console\Commands;

use App\Models\BookingList;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BookingListStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set booking to start based on time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data_booking = BookingList::where('status', 'DISETUJUI')
            ->whereDate('date', '=', Carbon::now()->toDateString())
            ->whereTime('start_time', '<', Carbon::now()->toTimeString())
            ->whereTime('end_time', '>', Carbon::now()->toTimeString())
            ->get();

        foreach ($data_booking as $booking) {
            $booking->status = 'DIGUNAKAN';
            $booking->save();
            Log::info('Booking start: ' . $booking->id);
        }
    }
}
