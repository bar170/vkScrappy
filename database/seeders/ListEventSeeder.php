<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_events')->insert([
            'event_id' => 1,
            'target_id' => 1,
        ]);
        DB::table('list_events')->insert([
            'event_id' => 2,
            'target_id' => 1,
        ]);
    }
}
