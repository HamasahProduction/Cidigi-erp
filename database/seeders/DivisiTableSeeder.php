<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisi')->insert([

            [
                'id'=>1,
                'nama'=>'Divisi Produksi A',
            ],
            [
                'id'=>2,
                'nama'=>'Divisi Produksi B',
            ],
            [
                'id'=>3,
                'nama'=>'Divisi Produksi C',
            ],
            [
                'id'=>4,
                'nama'=>'Divisi Produksi D',
            ],

        ]);
    }
}
