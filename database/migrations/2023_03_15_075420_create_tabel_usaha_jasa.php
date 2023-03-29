<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelUsahaJasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usahajasa', function (Blueprint $table) {
            $table->string('id',30)->primary();
            $table->string('namausaha',30);
            $table->string('lokasiusaha');
            $table->string('jenis pendapatan',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_usaha_jasa');
    }
}
