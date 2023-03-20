<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert 10 random Usuarios
        for($q = 0; $q < 25; $q++)
        {
            Usuario::create([
                'name' => ucfirst(Str::random(10)),
                'email' => strtolower(Str::random(10)).'@gmail.com',
                'phone' => '+55'.
                            strval(rand(10,99)).
                            '9'.
                            strval(rand(10000000,99999999))
            ]);
        }
    }
}
