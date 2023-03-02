<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_username')->nullable();
            $table->string('github_avatar')->nullable();
            $table->string('github_user_id')->nullable();
            $table->string('github_token', 1000)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_username');
            $table->dropColumn('github_avatar');
            $table->dropColumn('github_user_id');
            $table->dropColumn('github_token');
        });
    }
};
