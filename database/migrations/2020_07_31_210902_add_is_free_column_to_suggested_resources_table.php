<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFreeColumnToSuggestedResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('suggested_resources', function (Blueprint $table) {
            $table->boolean('is_free')->default(true);
        });
    }

    public function down()
    {
        Schema::table('suggested_resources', function (Blueprint $table) {
            $table->dropColumn('is_free');
        });
    }
}
