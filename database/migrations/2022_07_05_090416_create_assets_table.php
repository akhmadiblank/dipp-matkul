<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->date('tanggal_perolehan');
            $table->foreignId('ruangan_id');
            $table->string('sumber_dana');
            $table->integer('jumlah_barang');
            $table->integer('harga_barang');
            $table->string('status');
            $table->string('keterangan');
            $table->string('foto_barang')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
