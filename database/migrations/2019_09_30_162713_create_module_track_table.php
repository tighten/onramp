<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleTrackTable extends Migration
{
    public function up()
    {
        Schema::create('module_track', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('track_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('track_id')->references('id')->on('tracks');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('module_track');
    }
}
