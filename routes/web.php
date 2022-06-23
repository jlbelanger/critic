<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Models\Tag;
use App\Models\Work;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	$vars = [];

	$vars['recentMovies'] = Work::where('is_private', '=', 0)
		->where('type', '=', 'Movie')
		->orderBy('start_date', 'DESC')
		->get()
		->take(5);

	$vars['stats'] = Work::where('is_private', '=', 0)
		->select(['type', DB::raw('COUNT(*) AS num')])
		->groupBy('type')
		->get()
		->pluck('num', 'type');

	$vars['tags'] = Tag::where('hide_from_cloud', '=', 0)
		->orderBy('short_title')
		->get();
	$vars['tagCounts'] = DB::table('tags')
		->select(['tags.slug', DB::raw('COUNT(*) AS num')])
		->join(DB::raw('tag_work'), function ($join) {
			$join->on('tags.id', '=', 'tag_work.tag_id');
		})
		->groupBy('tags.slug')
		->get()
		->pluck('num', 'slug');

	$vars['moviesByDecade'] = DB::table('works')
		->select([DB::raw('SUBSTRING(start_release_year, 1, 3) AS decade'), DB::raw('COUNT(*) AS num')])
		->where('type', '=', 'Movie')
		->where('is_private', '=', 0)
		->groupBy(DB::raw('SUBSTRING(start_release_year, 1, 3)'))
		->orderBy(DB::raw('SUBSTRING(start_release_year, 1, 3)'))
		->get();

	$vars['moviesByRating'] = DB::table('works')
		->select(['rating', DB::raw('COUNT(*) AS num')])
		->where('type', '=', 'Movie')
		->where('is_private', '=', 0)
		->groupBy('rating')
		->orderBy('rating')
		->get();

	$vars['currentTv'] = Work::where('is_private', '=', 0)
		->where('type', '=', 'Tv')
		->whereNotNull('start_date')
		->whereNull('end_date')
		->get();

	$vars['favouriteTv'] = Work::where('is_private', '=', 0)
		->where('type', '=', 'Tv')
		->where('is_favourite', '=', 1)
		->get();

	$vars['favouriteMovies'] = Work::where('is_private', '=', 0)
		->where('type', '=', 'Movie')
		->where('is_favourite', '=', 1)
		->get();

	return view('home', $vars);
});

Route::get('/feed.xml', function () {
	$vars = [];
	$vars['works'] = Work::where('is_private', '=', 0)
		->orderBy('start_date', 'desc')
		->get()
		->take(10);
	return response()
		->view('feed', $vars)
		->header('Content-Type', 'text/xml');
});

Route::middleware('guest')->group(function () {
	Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
	Route::post('login', [AuthenticatedSessionController::class, 'store']);

	Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
	Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

	Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
	Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
	Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
