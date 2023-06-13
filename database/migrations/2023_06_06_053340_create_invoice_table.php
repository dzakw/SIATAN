<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pinjaman_id');
            $table->foreign('pinjaman_id')->references('id')->on('pinjaman')->onDelete('cascade');
            $table->integer('jumlah_tagihan');
            $table->date('tanggal_pinjam');
            $table->date('tenggat_tagihan');
            $table->integer('denda');
            $table->integer('biaya_jasa');
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
        Schema::dropIfExists('invoice');
    }
}
