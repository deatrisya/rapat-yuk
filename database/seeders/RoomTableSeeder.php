<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataItem = [
            [
                'room_name' => 'Room 1',
                'facility' => 'AC, Papan Tulis',
                'capacity' => 20,
                'availability' => true,
            ],
            [
                'room_name' => 'Room 2',
                'facility' => 'AC, Papan Tulis',
                'capacity' => 20,
                'availability' => true,
            ]
        ];
        DB::table('rooms')->insert($dataItem);
    }
}
