<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiutangMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutang_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('usulan');
            $table->integer('sisa');
            $table->integer('waktu');
            $table->integer('waktusisa');
            $table->string('status',100);
            $table->string('id_anggota');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piutang_masters');
    }
}
