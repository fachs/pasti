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
        Schema::create('req_ttds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 10);
            $table->string('pic_kontak');
            $table->string('pic_name');
            $table->string('file_surat');
            $table->string('file_ttd');
            $table->string('nama_ttd');
            $table->string('bidang', 25);
            $table->string('jabatan_ttd');
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
        Schema::dropIfExists('req_ttds');
    }
};
