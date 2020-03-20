<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleResourceTable extends Migration
{
    public function up()
    {
        Schema::create('module_resource', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('resource_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('module_resource');
    }
}
