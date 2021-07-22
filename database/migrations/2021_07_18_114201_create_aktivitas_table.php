<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->bigIncrements('id_aktivitas');
            
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
            $table->string('nama_kegiatan');
            $table->text('keterangan_kegiatan');
            $table->date('mulai_kegiatan');
            $table->date('akhir_kegiatan');

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
        Schema::dropIfExists('aktivitas');
    }
}
