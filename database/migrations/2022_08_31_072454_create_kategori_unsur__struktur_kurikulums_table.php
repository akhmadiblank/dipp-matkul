<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriUnsurStrukturKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_unsur_struktur_kurikulum', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('kategori_unsur_id');
            $table->unsignedInteger('struktur_kurikulum_id');
            // $table->primary(['kategori_unsur_id','struktur_kurikulum_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_unsur_struktur_kurikulum');
    }
}
