<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('suplier_id')->index();
            $table->unsignedInteger('satuan_ukuran_id')->index();
            $table->string('kode');
            $table->string('nama');
            $table->string('ukuran');
            $table->integer('harga_jual');
            $table->integer('jumlah_total');
            $table->integer('jumlah_min');
            $table->enum('jenis_barang',['bahan_baku','bahan_setengah_jadi','bahan_jadi']);
            $table->boolean('is_status')->default(1);


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('suplier_id')->references('id')->on('suplier')->onDelete('cascade');
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
        Schema::dropIfExists('barang');
    }
}
