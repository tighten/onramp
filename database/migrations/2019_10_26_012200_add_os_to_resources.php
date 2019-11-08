<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOsToResources extends Migration
{
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->string('os')->default('any');
        });
    }

    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn('os');
        });
    }
}
