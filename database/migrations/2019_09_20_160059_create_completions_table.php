<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletionsTable extends Migration
{
    public function up()
    {
        Schema::create('completions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('completable_id');
            $table->string('completable_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('completions');
    }
}
