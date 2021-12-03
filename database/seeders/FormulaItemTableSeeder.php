<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormulaItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formula_item')->insert([

            [
                'nama'   => 'Mur',
                'harga_peritem'=> 5000,
            ],
            [
                'nama'   => 'Roda',
                'harga_peritem'=> 250000,
            ],
            [
                'nama'   => 'Pegangan',
                'harga_peritem'=> 300000,
            ],
            [
                'nama'   => 'Penyangga',
                'harga_peritem'=> 280000,
            ],
        ]);

    }
}
