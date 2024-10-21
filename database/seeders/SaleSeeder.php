<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $showtimes = Showtime::select('id')->get()->pluck('id');
        Sale::factory()->count(rand(200, 300))
            ->sequence(fn (Sequence $sequence) => [
                'showtime_id' => $showtimes->random(),
            ])
            ->create();
    }
}
