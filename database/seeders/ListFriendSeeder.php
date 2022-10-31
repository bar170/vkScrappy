<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_friends')->insert([
            'target_id' => 1,
            'friend_id' => 1,
        ]);
        DB::table('list_friends')->insert([
            'target_id' => 1,
            'friend_id' => 2,
        ]);
    }
}
