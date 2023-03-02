<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('resource_term', function (Blueprint $table) {
            $table
                ->foreign('resource_id')
                ->references('id')
                ->on('resources')
                ->onDelete('cascade');
            $table
                ->foreign('term_id')
                ->references('id')
                ->on('terms')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('resource_term', function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(['resource_id']);
                $table->dropForeign(['term_id']);
            }
        });
    }
};
