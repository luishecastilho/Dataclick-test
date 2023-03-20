<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Fatura;

class FaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($r = 1; $r <= 9; $r++)
        {
            for($e = 1; $e <= 12; $e++)
            {
                $mes = $e < 10 ? '0'.strval($e) : strval($e);
                $possible_payment = rand(1, 3) % 2 == 0 ? false : true;
                Fatura::create([
                    'relation_id' => $r,
                    'expiry_date' => '2023-'.$mes.'-10',
                    'paid' => $e > 3 ? false : $possible_payment,
                    'amount' => 129.99
                ]);
            }
        }
    }
}
