<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([

            [
                'kode'              =>'YOSO-001',
                'nama'              => 'Karet Pegangan',
                'suplier_id'        =>1,
                'ukuran'            => '10',
                'satuan_ukuran_id'  =>'1',
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],
            [
                'kode'              =>'YOSO-002',
                'nama'              => 'Besi Panjang',
                'suplier_id'        =>2,
                'ukuran'            => '10',
                'satuan_ukuran_id'  =>'1',
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],
            [
                'kode'              =>'YOSO-003',
                'nama'              => 'Ban Dalam',
                'suplier_id'        =>3,
                'ukuran'            => '10',
                'satuan_ukuran_id'  => 1,
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],
            [
                'kode'              =>'YOSO-004',
                'nama'              => 'Velg Ban',
                'suplier_id'        =>4,
                'ukuran'            => '1000',
                'satuan_ukuran_id'  => 2,
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],
            [
                'kode'              =>'YOSO-005',
                'nama'              => 'Karet Ban',
                'suplier_id'        =>5,
                'ukuran'            => '10',
                'satuan_ukuran_id'  => 1,
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],
            [
                'kode'              =>'YOSO-006',
                'nama'              => 'Rangka Kaki',
                'suplier_id'        =>6,
                'ukuran'            => '10000',
                'satuan_ukuran_id'  => 3,
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],
            [
                'kode'              =>'YOSO-007',
                'nama'              => 'Bak Angkut ',
                'suplier_id'        =>7,
                'ukuran'            => '10',
                'satuan_ukuran_id'  => 1,
                'harga_jual'        =>125000,
                'jumlah_total'      => '90000',
                'jumlah_min'        => '100',
                'jenis_barang'      => 'bahan_baku',
                'is_status'         => 0,
            ],

        ]);
    }
}
