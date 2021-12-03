<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_unit', function (Blueprint $table) {
            $table->unsignedInteger('material_id');
            $table->unsignedInteger('unit_id');
            $table->integer('biaya');
            $table->integer('qty');    
            $table->timestamps();

             $table->foreign('material_id')
                    ->references('id')->on('material')
                    ->onDelete('cascade');

            $table->foreign('unit_id')
                    ->references('id')->on('unit')
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
        Schema::dropIfExists('material_unit');
    }
}
