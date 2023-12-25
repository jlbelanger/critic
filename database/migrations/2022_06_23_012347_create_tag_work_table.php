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
		Schema::create('tag_work', function (Blueprint $table) {
			$table->id();
			$table->foreignId('tag_id')->references('id')->on('tags')->constrained()->onDelete('restrict');
			$table->foreignId('work_id')->references('id')->on('works')->constrained()->onDelete('restrict');
		});
	}

	/**
	 * Reverses the migrations.
	 *
	 * @return void
	 */
	public function down() : void
	{
		Schema::dropIfExists('tag_work');
	}
};
