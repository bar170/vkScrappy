<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_groups')->insert([
            'target_id' => 1,
            'group_id' => 1,
        ]);
        DB::table('list_groups')->insert([
            'target_id' => 1,
            'group_id' => 2,
        ]);
    }
}
