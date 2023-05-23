<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    public function up()
    {
        Schema::create('mobils', function (Blueprint $collection) {
            $collection->id();
            $collection->foreignId('kendaraan_id')->constrained('kendaraan')->onDelete('cascade');
            $collection->string('mesin');
            $collection->integer('kapasitas_penumpang');
            $collection->string('tipe');
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobils');
    }
}
