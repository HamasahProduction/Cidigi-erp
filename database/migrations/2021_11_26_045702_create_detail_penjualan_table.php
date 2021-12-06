<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_penjualan');
            $table->string('product_name');
            $table->string('kategory');
            $table->string('satuan');
            $table->decimal('harga', 10, 2)->default('0.00');
            $table->tinyInteger('qty')->default(1);
            $table->decimal('discount', 5, 2)->default('0.00');
            $table->decimal('subtotal', 11, 2)->default('0.00');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_detail');
    }
}
