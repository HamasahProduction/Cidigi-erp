<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimasiStockFormulaUtamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimasi_stock_formula_utama', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('formula_utama_id');
            $table->unsignedInteger('formula_item_id');
            $table->integer('jumlah_stok');
            $table->integer('kebutuhan_utama');
            $table->integer('estimasi_stok_item');
            $table->integer('estimasi_stok_utama');

            $table->timestamps();

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
        Schema::dropIfExists('estimasi_stock_formula_utama');
    }
}
