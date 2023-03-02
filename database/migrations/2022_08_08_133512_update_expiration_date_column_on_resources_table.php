<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->timestamp('expiration_date')
                ->nullable()
                ->default(now()->addMonths(6))
                ->after('module_id')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->timestamp('expiration_date')
                ->default(now()->addMonths(6))
                ->after('module_id')
                ->change();
        });
    }
};
