<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('material')->insert([

            [

                'nama'              => 'Plate Strip 30*30',
            ],
            [

                'nama'              => 'Siku 40*$40 KS',
            ],
            [

                'nama'              => 'AS Behel 6*12000',
            ],
            [

                'nama'              => 'S45C 4*300',
            ],
            [

                'nama'              => 'Plate MS T 1mm',
            ],

        ]);
    }
}
