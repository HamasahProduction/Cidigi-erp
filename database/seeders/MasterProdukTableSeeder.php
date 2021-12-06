<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_produk')->insert([

            [

                'suplier_id'        => 1,
                'nama'              => 'Karet Pegangan',
            ],
            [

                'suplier_id'        => 2,
                'nama'              => 'Besi Panjang',
            ],
            [

                'suplier_id'        => 3,
                'nama'              => 'Ban Dalam',
            ],
            [

                'suplier_id'        => 1,
                'nama'              => 'Velg Ban',
            ],
            [

                'suplier_id'        => 1,
                'nama'              => 'Karet Ban',
            ],
            [

                'suplier_id'        => 4,
                'nama'              => 'Rangka Kaki',
            ],
            [

                'suplier_id'        => 3,
                'nama'              => 'Bak Angkut',
            ],

        ]);
    }
}
