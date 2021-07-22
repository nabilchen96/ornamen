<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_masuks', function (Blueprint $table) {
            $table->bigIncrements('id_inventaris_masuk');
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
            $table->unsignedBigInteger('id_inventaris');
            $table->foreign('id_inventaris')
                    ->references('id_inventaris')
                    ->on('daftar_inventaris')
                    ->onDelete('cascade');

            $table->integer('stok_masuk');
            $table->integer('biaya');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris_masuks');
    }
}
