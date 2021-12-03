<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanUkuranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukuran')->insert([

            [
                'id'=>1,
                'nama'=>'Meter',
            ],
            [
                'id'=>2,
                'nama'=>'Centimeter',
            ],
            [
                'id'=>3,
                'nama'=>'Milimeter',
            ],
            [
                'id'=>4,
                'nama'=>'Kilogram',
            ],
            [
                'id'=>5,
                'nama'=>'Gram',
            ],
            [
                'id'=>6,
                'nama'=>'Unit',
            ],

        ]);
    }
}
