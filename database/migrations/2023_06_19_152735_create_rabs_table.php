<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 10);
            $table->string('rincian');
            $table->integer('proker_id');
            $table->string('bidang', 25);
            $table->integer('harga');
            $table->integer('kuantitas');
            $table->integer('total');
            // $table->string('pic_bidang');
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
        Schema::dropIfExists('rabs');
    }
};
