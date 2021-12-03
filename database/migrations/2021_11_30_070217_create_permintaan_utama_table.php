<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanUtamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_utama', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_permintaan');
            $table->unsignedInteger('formula_utama_id');
            $table->unsignedInteger('formula_item_id');
            $table->integer('jumlah_permintaan_utama');
            $table->date('tanggal_permintaan');
            $table->boolean('status_permintaan');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('formula_utama_id')
                    ->references('id')->on('formula_utama')
                    ->onDelete('cascade');

            $table->foreign('formula_item_id')
                    ->references('id')->on('formula_item')
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
        Schema::dropIfExists('permintaan_utama');
    }
}
