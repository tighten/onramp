<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::table('resource_term', function (Blueprint $table) {
            $table->foreign('resource_id')->references('id')->on('resources');
            $table->foreign('term_id')->references('id')->on('terms');
        });
    }

    public function down()
    {
        Schema::table('resource_term', function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(['resource_id']);   
                $table->dropForeign(['term_id']);   
            }
        });
    }
};
