<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_hasils', function (Blueprint $table) {
            $table->bigIncrements('id_beli_hasil');
            
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->integer('total_harga');

            $table->string('biaya_pengiriman');

            $table->integer('grand_total');

            $table->enum('status', ['dibayar', 'belum dibayar', 'cancel']);

            $table->string('resi');

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
        Schema::dropIfExists('beli_hasils');
    }
}
