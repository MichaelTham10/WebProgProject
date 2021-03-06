<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'address' => 'jalan kematian',
            'gender' => 'male',
            'dob' => '2021-10-14',
            'is_admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'panzzz',
            'email' => 'panzzz@email.com',
            'password' => Hash::make('12345678'),
            'address' => 'jalan kematian',
            'gender' => 'male',
            'dob' => '2021-10-14',
            'is_admin' => false,
        ]);
    }
}
