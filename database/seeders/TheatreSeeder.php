<?php

namespace Database\Seeders;

use App\Models\Theatre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TheatreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->theatres()->map(fn ($theatre) => Theatre::factory()->create(['name'=>$theatre]));
    }

    public function theatres()
    {
        return collect([
            'Grand Horizon Cinemas',
            'Starview Theatre',
            'The Majestic Screen',
            'Cinema Royale',
            'Silver Sky Cinema',
            'Dreamlight Theatre',
            'Galaxy Plaza Cinema',
            'Empire Cinema Hall',
            'The Paramount Theatre'
        ]);
    }
}
