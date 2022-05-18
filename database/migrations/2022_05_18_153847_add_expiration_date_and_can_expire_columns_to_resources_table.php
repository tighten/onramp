<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpirationDateAndCanExpireColumnsToResourcesTable extends Migration
{

    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->timestamp('expiration_date')->nullable()->after('module_id');
            $table->boolean('can_expire')->default(false)->after('is_bonus');
        });
    }

    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn('expiration_date');
            $table->dropColumn('can_expire');
        });
    }
}
