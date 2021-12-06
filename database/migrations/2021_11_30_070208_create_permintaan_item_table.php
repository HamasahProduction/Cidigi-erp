<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('formula_item_id');
            $table->unsignedInteger('barang_id');
            $table->string('jumlah');
            $table->string('kode_permintaan');
            $table->integer('jumlah_permintaan_item');
            $table->date('tanggal_permintaan');
            $table->boolean('status_permintaan')->default(1);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('formula_item_id')
                    ->references('id')->on('formula_item')
                    ->onDelete('cascade');

            $table->foreign('barang_id')
                    ->references('id')->on('barang')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_item');
    }
}
