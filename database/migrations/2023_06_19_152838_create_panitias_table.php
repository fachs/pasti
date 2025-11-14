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
        Schema::create('panitias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nim', 10);
            $table->string('no_whatsapp', 15);
            $table->string('prodi', 50);
            $table->text('alasan');
            $table->text('kepanitiaan_id');
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
        Schema::dropIfExists('panitias');
    }
};
