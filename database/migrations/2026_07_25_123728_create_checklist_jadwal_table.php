<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistJadwalTable extends Migration
{
    public function up()
    {
        Schema::create('checklist_jadwal', function (Blueprint $table) {
            $table->id();

            $table->foreignId('jadwal_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('checklist_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->boolean('selesai')->default(false);

            $table->timestamps();

            $table->unique(['jadwal_id','checklist_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_jadwal');
    }
}