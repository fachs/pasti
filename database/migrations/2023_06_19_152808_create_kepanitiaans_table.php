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
        Schema::create('kepanitiaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('divisi', 25);
            $table->string('bidang', 25);
            $table->integer('proker_id');
            $table->string('pelaksanaan', 10);
            $table->text('jobdesc');
            $table->text('nama_proker');
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
        Schema::dropIfExists('kepanitiaans');
    }
};
