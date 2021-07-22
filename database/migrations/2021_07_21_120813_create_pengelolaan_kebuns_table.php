<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelolaanKebunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelolaan_kebuns', function (Blueprint $table) {
            $table->bigIncrements('id_kelola_kebun');

            $table->unsignedBigInteger('id');
            $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
            $table->unsignedBigInteger('id_tanaman');
            $table->foreign('id_tanaman')
                    ->references('id_inventaris_user')
                    ->on('inventaris_users')
                    ->onDelete('cascade');

            $table->integer('tanaman_dipakai');

            $table->unsignedBigInteger('id_pupuk');
            $table->foreign('id_pupuk')
                    ->references('id_inventaris_user')
                    ->on('inventaris_users')
                    ->onDelete('cascade');

            $table->integer('pupuk_dipakai');

            $table->unsignedBigInteger('id_media_tanam');
            $table->foreign('id_media_tanam')
                    ->references('id_inventaris_user')
                    ->on('inventaris_users')
                    ->onDelete('cascade');

            $table->integer('media_tanam_dipakai');


            $table->integer('luas_tanah');
            $table->date('waktu_tanam');


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
        Schema::dropIfExists('pengelolaan_kebuns');
    }
}
