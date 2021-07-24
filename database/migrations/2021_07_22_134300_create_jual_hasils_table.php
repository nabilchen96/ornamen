<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJualHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual_hasils', function (Blueprint $table) {
            $table->bigIncrements('id_jual_hasil');

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

            $table->string('foto_produk');
            
            $table->string('judul_keterangan');
            $table->string('ukuran_jual');
            $table->integer('stok');
            $table->integer('harga');

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
        Schema::dropIfExists('jual_hasils');
    }
}
