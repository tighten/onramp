<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suggested_resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('url');
            $table->text('notes')->nullable();
            $table->string('language');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suggested_resources');
    }
};
