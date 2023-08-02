<?php

namespace App\Console\Commands;

use App\Models\BookingList;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BookingListFinish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:finish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set booking to finish based on time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data_booking = BookingList::where('status', 'DIGUNAKAN')
            ->whereDate('date', '=', Carbon::now()->toDateString())
            ->whereTime('end_time', '<', Carbon::now()->toTimeString())
            ->get();

        foreach ($data_booking as $booking) {
            $booking->status = 'SELESAI';
            $booking->save();
            Log::info('Booking completed' . $booking->id);
        }
    }
}
