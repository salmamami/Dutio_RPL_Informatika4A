<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenghuniIdToPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->foreignId('penghuni_id')
                  ->after('laporan_id')
                  ->constrained('penghunis')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropForeign(['penghuni_id']);
            $table->dropColumn('penghuni_id');
        });
    }
}