<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuplierTableSeeder::class);
        // $this->call(MasterProdukTableSeeder::class);
        $this->call(SatuanUkuranTableSeeder ::class);
        $this->call(DivisiTableSeeder::class);

        $this->call(BarangTableSeeder::class);
        $this->call(FormulaUtamaTableSeeder::class);
        $this->call(FormulaItemTableSeeder::class);
    }
}
