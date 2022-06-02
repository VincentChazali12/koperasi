<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQurbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qurbans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nik',50);
            $table->string('tahun',50);
            $table->integer('nominal');
            $table->integer('totalsimpanan');
            $table->string('status', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qurbans');
    }
}
