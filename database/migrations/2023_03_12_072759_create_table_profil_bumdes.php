<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfilBumdes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProfilBumdes', function (Blueprint $table) {
            $table->string('id',30)->primary();
            $table->string('nama',30)->unique();
            $table->string('alamat');
            $table->string('foto',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_profil_bumdes');
    }
}
