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
        Schema::create('kode_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('subsubrincian');
            $table->string('subrincian');
            $table->string('rincianobjek');
            $table->string('objek');
            $table->string('jenis');
            $table->string('kelompok');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('kode_barangs');
        Schema::enableForeignKeyConstraints();
    }
};
