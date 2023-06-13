<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_poktan_id');
            $table->foreign('anggota_poktan_id')->references('id')->on('anggota_poktan')->onDelete('cascade');
            $table->integer('jumlah_pinjaman');
            $table->integer('biaya_jasa');
            $table->date('tanggal_pinjaman');
            $table->enum('status', ['pending', 'belum_lunas', 'lunas']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
