<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(10)->has(\App\Models\Serie::factory()->count(2))->create();
        //factory(Serie::class, 10)->create();
        //\App\Models\Serie::factory(10)->has(\App\Models\Comment::factory()->count(2))->create();

    }
}
