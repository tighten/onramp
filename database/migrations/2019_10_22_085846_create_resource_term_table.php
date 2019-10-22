<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceTermTable extends Migration
{
    public function up()
    {
        Schema::create('resource_term', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resource_id');
            $table->unsignedBigInteger('term_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resource_term');
    }
}
