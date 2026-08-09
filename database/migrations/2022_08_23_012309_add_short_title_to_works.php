<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		Schema::table('works', function (Blueprint $table) {
			$table->string('short_title')->nullable();
		});
	}

	public function down() : void
	{
		Schema::table('works', function (Blueprint $table) {
			$table->dropColumn('short_title');
		});
	}
};
