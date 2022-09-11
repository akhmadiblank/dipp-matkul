<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrukturKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struktur_kurikulums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masterkurikulum_id');
            $table->foreignId('semester_id');
            $table->foreignId('matkul_id');
            $table->integer('beban_studi');
            $table->json('bentuk_pembelajaran')->nullable();
            // $table->string('kategoriunsur_id');
            $table->string('prasyarat');
            $table->boolean('project_base_learning');
            $table->boolean('case_base_learning');
            $table->boolean('problem_based_learning');
            $table->boolean('others');
            $table->string('keterangan');
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
        Schema::dropIfExists('struktur_kurikulums');
    }
}
