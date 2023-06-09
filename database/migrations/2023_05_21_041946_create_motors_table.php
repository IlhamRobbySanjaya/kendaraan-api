<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    public function up()
    {
        Schema::create('motors', function (Blueprint $collection) {
            $collection->id();
            $collection->foreignId('kendaraan_id')->constrained('kendaraan')->onDelete('cascade');
            $collection->string('mesin');
            $collection->string('tipe_suspensi');
            $collection->string('tipe_transmisi');
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motors');
    }
}
