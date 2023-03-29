<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelJenisPendapatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenispendapatan', function (Blueprint $table) {
            $table->string('id',30)->primary()->nullable();
            $table->string('idjasa',30)->nullable();
            $table->string('namajenispendapatan')->nullable();
            
            $table->foreign('idjasa')->references('id')->on('usahajasa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_jenis_pendapatan');
    }
}
