<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Usuario_Clube__relation;

class Usuario_Clube__relationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario_Clube__relation::create([
            'usuario_id' => 1,
            'clube_id' => 9
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 4,
            'clube_id' => 1
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 12,
            'clube_id' => 6
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 19,
            'clube_id' => 2
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 4,
            'clube_id' => 6
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 1,
            'clube_id' => 7
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 6,
            'clube_id' => 3
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 24,
            'clube_id' => 4
        ]);
        Usuario_Clube__relation::create([
            'usuario_id' => 4,
            'clube_id' => 10
        ]);
    }
}
