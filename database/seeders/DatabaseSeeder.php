<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(TheatreSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ShowtimeSeeder::class);
        $this->call(SaleSeeder::class);
    }
}
