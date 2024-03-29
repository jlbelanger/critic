<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Runs the migrations.
	 *
	 * @return void
	 */
	public function up() : void
	{
		Schema::create('tags', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('short_title')->nullable();
			$table->string('slug')->unique();
			$table->boolean('is_private')->default(false);
			$table->boolean('hide_from_cloud')->default(false);
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();
		});
	}

	/**
	 * Reverses the migrations.
	 *
	 * @return void
	 */
	public function down() : void
	{
		Schema::dropIfExists('tags');
	}
};
