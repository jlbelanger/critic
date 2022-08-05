<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
	/**
	 * Runs the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function (Blueprint $table) {
			$table->id();
			$table->string('type');
			$table->string('title');
			$table->smallInteger('start_release_year')->unsigned()->nullable();
			$table->smallInteger('end_release_year')->unsigned()->nullable();
			$table->string('slug');
			$table->text('content')->nullable();
			$table->boolean('is_private')->default(false);
			$table->boolean('is_favourite')->default(false);
			$table->float('rating')->unsigned()->nullable();
			$table->string('start_date', 10)->nullable();
			$table->string('end_date', 10)->nullable();
			$table->string('author')->nullable();
			$table->timestamp('published_at')->nullable();
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

			$table->index('type');
			$table->index('slug');

			$table->unique(['type', 'slug']);
		});
	}

	/**
	 * Reverses the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('works');
	}
}
