<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggota2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota2s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama',100);
            $table->string('ttl', 100);
            $table->string('nik',100)->unique();
            $table->string('alamat',100);
            $table->string('tempat_tugas',100);
            $table->string('telp',100);
            $table->string('norek',100);
            $table->string('status',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota2s');
    }
}
