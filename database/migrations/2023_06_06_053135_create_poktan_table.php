<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoktanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poktan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->foreignId('gapoktan_id');
            $table->foreign('gapoktan_id')->references('id')->on('gapoktan')->onDelete('cascade');
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
        Schema::dropIfExists('poktan');
    }
}
