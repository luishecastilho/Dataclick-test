<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

Use App\Models\Clube;

class ClubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Flamengo
        Clube::create([
            'name' => 'Flamengo',
            'icon' => 'https://api.sofascore.app/api/v1/team/5981/image',
            'country' => 'Brasil',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/br.png'
        ]);

        // Palmeiras
        Clube::create([
            'name' => 'Palmeiras',
            'icon' => 'https://api.sofascore.app/api/v1/team/1963/image',
            'country' => 'Brasil',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/br.png'
        ]);

        // Corinthians
        Clube::create([
            'name' => 'Corinthians',
            'icon' => 'https://api.sofascore.app/api/v1/team/1957/image',
            'country' => 'Brasil',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/br.png'
        ]);

        // Cruzeiro
        Clube::create([
            'name' => 'Cruzeiro',
            'icon' => 'https://api.sofascore.app/api/v1/team/1954/image',
            'country' => 'Brasil',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/br.png'
        ]);

        // Grêmio
        Clube::create([
            'name' => 'Grêmio',
            'icon' => 'https://api.sofascore.app/api/v1/team/5926/image',
            'country' => 'Brasil',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/br.png'
        ]);

        // Liverpool
        Clube::create([
            'name' => 'Liverpool',
            'icon' => 'https://api.sofascore.app/api/v1/team/44/image',
            'country' => 'Inglaterra',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/en.png'
        ]);

        // Arsenal
        Clube::create([
            'name' => 'Arsenal',
            'icon' => 'https://api.sofascore.app/api/v1/team/42/image',
            'country' => 'Inglaterra',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/en.png'
        ]);

        // Chelsea
        Clube::create([
            'name' => 'Chelsea',
            'icon' => 'https://api.sofascore.app/api/v1/team/38/image',
            'country' => 'Inglaterra',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/en.png'
        ]);

        // Manchester City
        Clube::create([
            'name' => 'Manchester City',
            'icon' => 'https://api.sofascore.app/api/v1/team/17/image',
            'country' => 'Inglaterra',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/en.png'
        ]);

        // Manchester United
        Clube::create([
            'name' => 'Manchester United',
            'icon' => 'https://api.sofascore.app/api/v1/team/35/image',
            'country' => 'Inglaterra',
            'countryFlag' => 'https://www.sofascore.com/static/images/flags/en.png'
        ]);
    }
}
