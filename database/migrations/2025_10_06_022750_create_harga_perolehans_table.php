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
        Schema::create('harga_perolehans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('saldo_awal');
            $table->bigInteger('haper_akhir');
            $table->unsignedBigInteger('hp_penambahan_id');
            $table->unsignedBigInteger('hp_pengurangan_id');
            $table->timestamps();

            $table->foreign('hp_penambahan_id')->references('id')->on('hppenambahans')->onDelete('cascade');
            $table->foreign('hp_pengurangan_id')->references('id')->on('hppengurangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_perolehans');
    }
};
