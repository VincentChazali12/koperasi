<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailHariRayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_hari_rayas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('bulan');
            $table->integer('id_hari_raya');
            $table->integer('simpanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_hari_rayas');
    }
}
