<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('targets')->insert([
            'gender' => 'Male',
            'name' => 'Павел Дуров',
            'vk_id' => 1,
            'link' => 'durov',
            'status_page_id' => 1,
            'location_id' => 1,
            'user_id' => 1,
            ]);
        DB::table('targets')->insert([
            'gender' => 'Male',
            'name' => 'Павел Дуров2',
            'vk_id' => 2,
            'link' => 'durov',
            'status_page_id' => 1,
            'location_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('targets')->insert([
            'gender' => 'Male',
            'name' => 'Павел Дуров3',
            'vk_id' => 3,
            'link' => 'durov',
            'status_page_id' => 1,
            'location_id' => 1,
            'user_id' => 1,
        ]);

    }
}
