<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::table('users', function (Blueprint $table) {
			$table->boolean('is_subscriber')->after('email_verified_at')->default(false);
		});
	}

	public function down(): void
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('is_subscriber');
		});
	}
};
