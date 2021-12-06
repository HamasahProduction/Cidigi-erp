<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->string('nama_pelanggan');
            $table->integer('id_user');
            $table->text('json_detail');
            $table->decimal('total', 11, 2);
            $table->decimal('ppn', 8, 2);
            $table->decimal('bayar', 11, 2);
            $table->decimal('changedue', 8, 2);
            $table->boolean('is_status')->default(1);
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
        Schema::dropIfExists('penjualan');
    }
}
