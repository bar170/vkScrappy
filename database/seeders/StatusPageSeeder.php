<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pages')->insert(['name' => 'Открытая страница']);
        DB::table('status_pages')->insert(['name' => 'Закрытая страница']);
        DB::table('status_pages')->insert(['name' => 'Удаленная страница']);
    }
}
