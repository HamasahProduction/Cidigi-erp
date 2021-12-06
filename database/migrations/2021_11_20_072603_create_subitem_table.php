<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subitem', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('formula_item_id');
            $table->unsignedInteger('barang_id');
            $table->integer('jumlah');

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
        Schema::dropIfExists('subitem');
    }
}
