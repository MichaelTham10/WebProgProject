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
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboard_categories')->insert([
            'name' => '61 Key Keyboard',
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboard_categories')->insert([
            'name' => 'XDA Profile',
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboards')->insert([
            'category_id' => '1',
            'name' => 'Razer',
            'price' => '100000',
            'desc' => 'so cool',
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboards')->insert([
            'category_id' => '1',
            'name' => 'Logitech',
            'price' => '120000',
            'desc' => 'so cool',
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboards')->insert([
            'category_id' => '1',
            'name' => 'Fantech',
            'price' => '1000000',
            'desc' => 'so cool',
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboards')->insert([
            'category_id' => '1',
            'name' => 'Rexus',
            'price' => '110000',
            'desc' => 'so cool',
            'image' => 'keyboard/keychorn.jpg',
        ]);

        DB::table('keyboards')->insert([
            'category_id' => '1',
            'name' => 'Keychorn',
            'price' => '150000',
            'desc' => 'so cool',
            'image' => 'keyboard/keychorn.jpg',
        ]);
    }
}
