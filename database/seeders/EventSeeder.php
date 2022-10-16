<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'value' => '52',
            'type_event_id' => 1,
        ]);
        DB::table('events')->insert([
            'value' => '53',
            'type_event_id' => 1,
        ]);
    }
}
