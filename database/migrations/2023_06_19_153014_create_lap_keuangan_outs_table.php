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
        Schema::create('lap_keuangan_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('penerima');
            $table->string('uraian');
            $table->integer('harga_satuan');
            $table->integer('kuantitas');
            $table->integer('total');
            $table->string('bidang', 25);
            $table->date('tanggal');
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
        Schema::dropIfExists('lap_keuangan_outs');
    }
};
