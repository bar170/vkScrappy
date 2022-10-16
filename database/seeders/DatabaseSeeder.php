<?php

namespace Database\Seeders;


use App\Models\Group;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([TypeEventSeeder::class]);
        $this->call([StatusPageSeeder::class]);
        $this->call([LocationSeeder::class]);
        $this->call([TargetSeeder::class]);
        $this->call([EventSeeder::class]);
        $this->call([FriendSeeder::class]);
        $this->call([GroupSeeder::class]);
        $this->call([ListEventSeeder::class]);
        $this->call([ListFriendSeeder::class]);
        $this->call([ListGroupSeeder::class]);
    }
}
