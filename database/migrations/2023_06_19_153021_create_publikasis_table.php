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
        Schema::create('publikasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('status', 10);
            $table->string('jenis', 10);
            $table->string('pic_kontak', 25);
            $table->string('pic_name');
            $table->string('pic_bidang');
            $table->string('keterangan_slide');
            $table->string('deskripsi');
            $table->string('lampiran');
            $table->string('tanggal_publikasi');
            $table->string('hasil_publikasi');
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
        Schema::dropIfExists('publikasis');
    }
};
