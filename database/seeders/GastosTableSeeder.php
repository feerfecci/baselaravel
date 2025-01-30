<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GastosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('gastos')->insert([
            [
                'id_user' => 1,
                'descricao' => 'descricao',
                'data' => '2025-01-12',
                'tipo' => 'tipo',
                'categoria' => 'categoria',
                'valor' => 12,
            ],
            [
                'id_user' => 2,
                'descricao' => 'descricao1',
                'data' => '2025-01-12',
                'tipo' => 'tipo3',
                'categoria' => 'categoria4',
                'valor' => 13,
            ],

        ]);
    }
}
