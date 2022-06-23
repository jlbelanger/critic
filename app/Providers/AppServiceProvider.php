<?php

namespace App\Providers;

use App\Http\Kernel;
use App\Models\Work;
use App\Observers\WorkObserver;
use DB;
use Illuminate\Support\ServiceProvider;
use Log;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Registers any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		\Laravel\Sanctum\Sanctum::ignoreMigrations();
	}

	/**
	 * Bootstraps any application services.
	 *
	 * @param  Kernel $kernel
	 * @return void
	 */
	public function boot(Kernel $kernel) // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundInExtendedClass
	{
		if (env('DISABLE_DEBUGBAR') === '1') {
			\Debugbar::disable();
		}

		if (env('LOG_DATABASE_QUERIES') === '1') {
			DB::listen(function ($query) {
				Log::info($query->sql, $query->bindings, $query->time);
			});
		}

		Work::observe(WorkObserver::class);
	}
}
