<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = Person::select('id')->get()->pluck('id');
        $movies = Movie::select('id')->get()->pluck('id');
        foreach($movies as $movie_id) {
            Role::factory()->count(rand(8,15))
                ->sequence(fn (Sequence $sequence) => $sequence->index === 0 ? [
                    'role'=>'director',
                    'person_id' => $people->random()
                ]:[
                    'person_id' => $people->random(),
                ])
                ->create(
                    ['movie_id'=>$movie_id]
                );
        }

    }
}
