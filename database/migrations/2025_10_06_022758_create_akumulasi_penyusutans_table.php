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
        Schema::create('akumulasi_penyusutans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('saldo_awal');
            $table->bigInteger('akumpe_akhir');
            $table->unsignedBigInteger('ap_penambahan_id');
            $table->unsignedBigInteger('ap_pengurangan_id');
            $table->timestamps();

            $table->foreign('ap_penambahan_id')->references('id')->on('appenambahans')->onDelete('cascade');
            $table->foreign('ap_pengurangan_id')->references('id')->on('appengurangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akumulasi_penyusutans');
    }
};
