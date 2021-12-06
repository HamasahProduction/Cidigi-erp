<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('barang_id')->index();
            $table->unsignedInteger('satuan_ukuran_id')->index();
            $table->string('kode_permintaan');
            $table->string('nama');
            $table->string('harga_barang');
            $table->string('ukuran');
            $table->date('tanggal_permintaan');
            $table->integer('jumlah_permintaan');
            $table->boolean('status_permintaan')->default(1);


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('satuan_ukuran_id')->references('id')->on('ukuran')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_barang');
    }
}
