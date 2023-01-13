<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('module_resource', function (Blueprint $table) {
            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade');
            $table->foreign('resource_id')
                ->references('id')
                ->on('resources')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('module_resource', function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(['module_id']);
                $table->dropForeign(['resource_id']);
            }
        });
    }
};
