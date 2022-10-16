<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Котики и мемы',
            'group_vk_id' => 123
        ]);
        DB::table('groups')->insert([
            'name' => 'Первый мемный',
            'group_vk_id' => 7887
        ]);
    }
}
