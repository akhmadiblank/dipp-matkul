<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterkurikulumProdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterkurikulum_prodi', function (Blueprint $table) {
            $table->unsignedInteger('prodi_id');
            $table->unsignedInteger('masterkurikulum_id');
            $table->primary(['prodi_id','masterkurikulum_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masterkurikulum_prodi');
    }
}
