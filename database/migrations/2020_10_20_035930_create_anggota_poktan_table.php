<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaPoktanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_poktan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota', 100);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->char('kontak', 12);
            $table->unsignedBigInteger('poktan_id'); // fix: change to unsigned big integer
            $table->foreign('poktan_id')->references('id')->on('poktan')->onDelete('cascade');
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
        Schema::dropIfExists('anggota');
    }
}
