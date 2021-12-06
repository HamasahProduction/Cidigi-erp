<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimasiStockFormulaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimasi_stock_formula_item', function (Blueprint $table) {
             $table->increments('id');
            $table->unsignedInteger('formula_item_id')->index();
            $table->unsignedInteger('barang_id')->index();
            $table->integer('jumlah_stok')->index();
            $table->integer('kebutuhan_item')->index();
            $table->integer('stok_barang_tersedia')->index();

            $table->timestamps();

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
        Schema::dropIfExists('estimasi_stock_formula_item');
    }
}
