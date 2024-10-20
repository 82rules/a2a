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
            'CineWave Theatre',
            'LuxeStar Screens',
            'Sunset Reel',
            'MetroCine Square',
            'Infinity Vision Theatre',
            'Cineverse Complex',
            'Starlit Theatres',
            'Aurora Cinema',
            'Vista Grand Cinemas',
            'Mirage Movie Palace',
            'Celestial Screens',
            'The Enclave Cinema',
            'NovaVista Cinemas',
            'Sunrise Showcase',
            'CineWorld Palace',
            'Eclipse Cinema House',
            'CineCraft Theatre',
            'Twilight Spectacle',
            'Urban Escape Cinemas',
            'Serenity Cinemas',
            'CineMosaic Complex',
            'The Paramount Theatre'
        ]);
    }
}
