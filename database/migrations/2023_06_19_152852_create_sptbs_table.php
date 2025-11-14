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
        Schema::create('sptbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('himpunan', 10);
            $table->integer('nominal_iuk');
            $table->integer('jumlah_mhs');
            $table->string('pic');
            $table->string('pic_nim', 8);
            $table->string('pic_wa', 25);
            $table->string('lampiran_sptb');
            $table->string('lampiran_nList');
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
        Schema::dropIfExists('sptbs');
    }
};
