<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'name' => 'Admin Riang',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Pegawai Riang',
                'email' => 'pegawai@example.com',
                'password' => Hash::make('pegawai'),
                'role' => 'pegawai',
            ]
        ];
        DB::table('users')->insert($dataItem);
    }
}
