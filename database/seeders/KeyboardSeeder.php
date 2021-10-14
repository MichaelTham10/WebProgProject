<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keyboard_categories')->insert([
            'name' => '87 Key Keyboard',
            'image' => '...',
        ]);

        DB::table('keyboard_categories')->insert([
            'name' => '61 Key Keyboard',
            'image' => '...',
        ]);

        DB::table('keyboard_categories')->insert([
            'name' => 'XDA Profile',
            'image' => '...',
        ]);

        DB::table('keyboards')->insert([
            'category_id' => '1',
            'name' => 'Razer',
            'price' => '100000',
            'desc' => 'so cool',
            'image' => 'this is image',
        ]);
    }
}