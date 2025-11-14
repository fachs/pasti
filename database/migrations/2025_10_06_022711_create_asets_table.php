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
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_aset_id');
            $table->unsignedBigInteger('kode_barang_id');
            $table->string('spesifikasi');
            $table->string('spek_lainnya')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('perolehan');
            $table->date('tgl_perolehan');
            $table->integer('ukuran')->nullable();
            $table->string('satuan');
            $table->string('kondisi');
            $table->string('lokasi');
            $table->string('foto');
            $table->integer('harga_perolehan');
            $table->string('sumber');
            $table->unsignedBigInteger('harga_perolehan_id');
            $table->unsignedBigInteger('akumulasi_penyusutan_id');
            $table->timestamps();

            $table->foreign('kode_aset_id')->references('id')->on('kode_asets')->onDelete('cascade');
            $table->foreign('kode_barang_id')->references('id')->on('kode_barangs')->onDelete('cascade');
            $table->foreign('harga_perolehan_id')->references('id')->on('harga_perolehans')->onDelete('cascade');
            $table->foreign('akumulasi_penyusutan_id')->references('id')->on('akumulasi_penyusutans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asets');
    }
};
