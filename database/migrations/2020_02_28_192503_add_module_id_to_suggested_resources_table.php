<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModuleIdToSuggestedResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('suggested_resources', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id')->nullable();
            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    public function down()
    {
        Schema::table('suggested_resources', function (Blueprint $table) {
            $table->dropForeign('suggested_resources_module_id_foreign');
            $table->dropColumn('module_id');
        });
    }
}
