<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->insert([
            'vk_id' => '2',
        ]);
        DB::table('friends')->insert([
            'vk_id' => '3',
        ]);
    }
}
