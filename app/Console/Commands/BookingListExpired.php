<?php

namespace App\Console\Commands;

use App\Models\BookingList;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BookingListExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set booking to expired based on time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data_booking = BookingList::where('status', 'PENDING')
            ->whereDate('date', '=', Carbon::now()->toDateString())
            ->whereTime('start_time', '<', Carbon::now()->toTimeString())
            ->get();

        foreach ($data_booking as $booking) {
            $booking->status = 'EXPIRED';
            $booking->save();

            Log::info('Booking expired: ' . $booking->id);
        }
    }
}
