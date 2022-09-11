<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkreditasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akreditasis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('keterangan');
            $table->timestamps();
        });
        Schema::create('akreditasi_prodi', function (Blueprint $table) {
            $table->unsignedInteger('akreditasi_id');
            $table->unsignedInteger('prodi_id');
            $table->primary(['akreditasi_id','prodi_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(['akreditasis','akreditasi_prodi']);
    }
}
