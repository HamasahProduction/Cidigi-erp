<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormulaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formula')->insert([

            [
                'id'     => 1,
                'nama'   => 'Kereta Sorong',
                'status' => 'utama',
            ],
            [
                'id'     => 2,
                'nama'   => 'Roda',
                'status' => 'item',
            ],
            [
                'id'     => 3,
                'nama'   => 'Angklong',
                'status' => 'utama',
            ],
            [
                'id'     => 4,
                'nama'   => 'Pegangan',
                'status' => 'item',
            ],
            [
                'id'     => 5,
                'nama'   => 'Formula 5',
                'status' => 'utama',
            ],
            [
                'id'     => 6,
                'nama'   => 'Penyangga',
                'status' => 'item',
            ],


        ]);
    }
}
