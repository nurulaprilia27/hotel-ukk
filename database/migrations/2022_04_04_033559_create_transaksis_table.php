<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->foreignId('user_id');
            $table->foreignId('tipe_kamar_id');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->integer('total_biaya');
            $table->integer('jumlah_kamar');
            $table->integer('jumlah_malam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
