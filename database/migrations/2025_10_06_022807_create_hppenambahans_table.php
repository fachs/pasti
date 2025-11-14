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
        Schema::create('hppenambahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('koreksi_saldo')->nullable();
            $table->bigInteger('belanja')->nullable();
            $table->bigInteger('hibah')->nullable();
            $table->bigInteger('mutasi')->nullable();
            $table->bigInteger('reklasifikasi')->nullable();
            $table->bigInteger('lainnya')->nullable();
            $table->bigInteger('total_penambahan');
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
        Schema::dropIfExists('hppenambahans');
    }
};
