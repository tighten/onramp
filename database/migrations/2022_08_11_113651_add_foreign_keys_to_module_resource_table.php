<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::table('module_resource', function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(['module_id']);
            }

            $table->foreign('module_id')
                ->references('id')
                ->on('modules');
            $table->foreign('resource_id')
                ->nullable()
                ->references('id')
                ->on('resources');
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
