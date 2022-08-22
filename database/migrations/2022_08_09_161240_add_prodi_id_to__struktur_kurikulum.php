<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdiIdToStrukturKurikulum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('struktur_kurikulums', function (Blueprint $table) {
            $table->foreignId('prodi_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('struktur_kurikulums', function (Blueprint $table) {
            $table->dropColumn('prodi_id');
        });
    }
}
