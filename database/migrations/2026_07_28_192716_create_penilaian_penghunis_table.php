<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianPenghunisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_penghunis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('penghuni_id')
                  ->constrained('penghunis')
                  ->cascadeOnDelete();

            $table->integer('poin');

            $table->string('kategori');

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
        Schema::dropIfExists('penilaian_penghunis');
    }
}