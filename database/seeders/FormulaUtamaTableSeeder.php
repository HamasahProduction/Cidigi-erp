<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormulaUtamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formula_utama')->insert([

            [
                'id'     => 1,
                'nama'   => 'Kereta Sorong',
                'harga_formula_utama' => 2000000,
            ],
            [
                'id'     => 2,
                'nama'   => 'Angklong',
                'harga_formula_utama' => 2500000,
            ],
            [
                'id'     => 3,
                'nama'   => 'Kereta Dorong Bangunan',
                'harga_formula_utama' => 3000000,
            ],
        ]);
    }
}
