<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataItem =  [
            [
                'room_id' => 1,
                'user_id' => 2,
                'date' => '2023-07-30',
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'qty_participants' => '20',
                'food' => '30',
                'description' => 'Rapat',
                'status' => 'PENDING',
            ],
            [
                'room_id' => 2,
                'user_id' => 2,
                'date' => '2023-07-30',
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'qty_participants' => '20',
                'food' => '30',
                'description' => 'Rapat',
                'status' => 'PENDING',
            ]
        ];
        DB::table('booking_lists')->insert($dataItem);
    }
}
