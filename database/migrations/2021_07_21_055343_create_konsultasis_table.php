<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->bigIncrements('id_konsultasi');
            
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->string('judul_konsultasi');
            $table->enum('status_konsultasi', [0,1]);

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
        Schema::dropIfExists('konsultasis');
    }
}
