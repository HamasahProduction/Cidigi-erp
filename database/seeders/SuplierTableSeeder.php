<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suplier')->insert([

            [
                'id'            => 1,
                'nama'          => 'PT Nippon Steel 1',
                'alamat'        => 'Jl. Pembangunan VI No.H20 Tuk, Kedawung, Cirebon, Jawa Barat 45153',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 2,
                'nama'          => 'PT Nippon Steel Corporation Indonesia',
                'alamat'        => 'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 3,
                'nama'          => 'PT Nippon Steel 3',
                'alamat'        => 'Jl. Pembangunan VI No.H20 Tuk, Kedawung, Cirebon, Jawa Barat 45153',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 4,
                'nama'          => 'PT Nippon Steel Corporation Indonesia PP',
                'alamat'        => 'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 5,
                'nama'          => 'PT Nippon Steel Corporation Indonesia PP 5',
                'alamat'        => 'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 6,
                'nama'          => 'PT Nippon Steel Corporation Indonesia PP 6',
                'alamat'        => 'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 7,
                'nama'          => 'PT Nippon Steel Corporation Indonesia PP 7',
                'alamat'        => 'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',
                'kontak'        => '08571189109',
            ],
            [
                'id'            => 8,
                'nama'          => 'PT Nippon Steel Corporation Indonesia PP8',
                'alamat'        => 'Jl. Asia Afrika No. 8, Gelora Bung Karno - Senayan, Jakarta Pusat 10270 Indonesia.',
                'kontak'        => '08571189109',
            ],

        ]);
    }
}
