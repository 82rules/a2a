<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Theatre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::select('id')->get()->pluck('id');
        $theatres = Theatre::select('id')->get()->pluck('id');;
        foreach ($theatres as $theatre) {
            Showtime::factory()->count(rand(5,10))
                ->sequence(fn (Sequence $sequence) => [
                    'movie_id' => $movies->random(),
                ])->create([
                'theatre_id' => $theatre,
            ]);
        }
    }
}
