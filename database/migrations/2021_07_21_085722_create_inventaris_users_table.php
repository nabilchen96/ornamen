<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_users', function (Blueprint $table) {
            $table->bigIncrements('id_inventaris_user');
            
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

            $table->integer('total_stok');

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
        Schema::dropIfExists('inventaris_users');
    }
}
