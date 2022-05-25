<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutangs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('usulan');
            $table->integer('angsuran_pokok');
            $table->integer('angsuran_jasa');
            $table->integer('angsuran_total');
            $table->integer('sisa');
            $table->integer('waktu');
            $table->string('ket',100);
            $table->string('id_piutang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piutangs');
    }
}
