<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKamarToPenghunisTable extends Migration
{
    public function up()
    {
        Schema::table('penghunis', function (Blueprint $table) {
            $table->string('kamar')->after('nama_penghuni');
        });
    }


    public function down()
    {
        Schema::table('penghunis', function (Blueprint $table) {
            $table->dropColumn('kamar');
        });
    }
}
