<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupPetanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_petanis', function (Blueprint $table) {
            $table->bigIncrements('id_group');
            
            $table->unsignedBigInteger('id_inventaris');
            $table->foreign('id_inventaris')
                    ->references('id_inventaris')
                    ->on('daftar_inventaris')
                    ->onDelete('cascade');
            
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
            $table->string('nomor_telegram');
            $table->enum('status', [0,1]);

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
        Schema::dropIfExists('group_petanis');
    }
}
