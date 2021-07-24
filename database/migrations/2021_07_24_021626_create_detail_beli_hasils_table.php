<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBeliHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_beli_hasils', function (Blueprint $table) {
            $table->bigIncrements('id_detail_beli_hasil');
            $table->unsignedBigInteger('id_beli_hasil');
            $table->foreign('id_beli_hasil')
                    ->references('id_beli_hasil')
                    ->on('beli_hasils')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('id_jual_hasil');
            $table->foreign('id_jual_hasil')
                    ->references('id_jual_hasil')
                    ->on('jual_hasils')
                    ->onDelete('cascade');
            $table->integer('jumlah');
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
        Schema::dropIfExists('detail_beli_hasils');
    }
}
