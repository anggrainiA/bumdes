<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('id_pelanggan');
            $table->string('id_jasa');
            $table->string('catatan')->nullable();
            $table->string('bukti')->nullable();
            $table->string('tanggal');
            $table->integer('total')->nullable();
            $table->integer('bayar')->nullable();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->foreign('id_jasa')->references('id')->on('jasa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_transaksi');
    }
}
