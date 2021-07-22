<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKonsultasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_konsultasis', function (Blueprint $table) {
            $table->bigIncrements('id_detail_konsultasi');
            
            $table->unsignedBigInteger('id_konsultasi');
            $table->foreign('id_konsultasi')
                    ->references('id_konsultasi')
                    ->on('konsultasis')
                    ->onDelete('cascade');
            
            $table->text('pesan');
            $table->enum('pemilik_pesan', ['user', 'admin']);

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
        Schema::dropIfExists('detail_konsultasis');
    }
}
