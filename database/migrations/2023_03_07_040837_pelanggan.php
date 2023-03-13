<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pelanggan', function (Blueprint $table) {
            // $table->id();
            $table->string('id',30)->primary();
            $table->string('nama',30)->unique();
            $table->string('no_telp',13);
            $table->string('alamat');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('pelanggan');
    }
}
