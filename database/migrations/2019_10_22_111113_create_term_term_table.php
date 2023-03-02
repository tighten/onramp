<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('term_term', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('related_term_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('term_term');
    }
};
