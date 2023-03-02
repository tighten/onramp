<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name');
            $table->boolean('is_bonus')->default(false);
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
