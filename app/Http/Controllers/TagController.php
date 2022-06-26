<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TagController extends Controller
{
	/**
	 * Shows the form for creating a new resource.
	 *
	 * @param  Request $request
	 * @return View
	 */
	public function create(Request $request) : View
	{
		return view('tags/create')
			->with('metaTitle', 'Add Tag')
			->with('defaultType', $request->query('type'));
	}

	/**
	 * Stores a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request) : RedirectResponse
	{
		$request->validate(Tag::rules());
		$input = $request->input();

		$input['is_private'] = $request->has('is_private');
		$input['hide_from_cloud'] = $request->has('hide_from_cloud');

		if (empty($input['is_private'])) {
			$input['published_at'] = date('Y-m-d H:i:s');
		}

		$row = Tag::create($input);
		Cache::forget('indexVarsAuth');
		Cache::forget('indexVarsGuest');

		if ($request->wantsJson()) {
			return response()->json(['message' => 'Tag added successfully.']);
		}
		return redirect($row->editUrl())
			->with('message', 'Tag added successfully.')
			->with('status', 'success');
	}

	/**
	 * Displays the specified resource.
	 *
	 * @param  Request $request
	 * @param  string  $slug
	 * @return View
	 */
	public function show(Request $request, string $slug) : View
	{
		$row = Tag::where('slug', '=', $slug);
		if (!Auth::user()) {
			$row = $row->where('is_private', '=', '0');
		}
		$row = $row->firstOrFail();
		$works = $row->works()
			->with([
				'tags' => function ($q) {
					$q->where('is_private', '=', '0')
						->orderBy('slug');
				},
			])
			->orderBy('title')
			->get();
		$defaults = [
			'title' => $request->query('title'),
			'year' => $request->query('year'),
			'author' => $request->query('author'),
			'date' => $request->query('date'),
			'rating' => $request->query('rating'),
			'tags' => $request->query('tags'),
		];
		return view('tags/show')
			->with('metaTitle', $row->title)
			->with('row', $row)
			->with('works', $works)
			->with('canonical', $row->url())
			->with('defaults', $defaults);
	}

	/**
	 * Shows the form for editing the specified resource.
	 *
	 * @param  string $id
	 * @return View
	 */
	public function edit(string $id) : View
	{
		$row = Tag::findOrFail($id);
		return view('tags/edit')
			->with('metaTitle', 'Edit ' . $row->title)
			->with('row', $row);
	}

	/**
	 * Updates the specified resource in storage.
	 *
	 * @param  Request $request
	 * @param  string  $id
	 * @return JsonResponse|RedirectResponse
	 */
	public function update(Request $request, string $id)
	{
		$row = Tag::findOrFail($id);
		$request->validate(Tag::rules($id));
		$input = $request->input();

		$input['is_private'] = $request->has('is_private');
		$input['hide_from_cloud'] = $request->has('hide_from_cloud');

		if (empty($input['published_at']) && empty($input['is_private'])) {
			$input['published_at'] = date('Y-m-d H:i:s');
		}

		$row->update($input);
		Cache::forget('indexVarsAuth');
		Cache::forget('indexVarsGuest');

		if ($request->wantsJson()) {
			return response()->json(['message' => 'Tag updated successfully.']);
		}

		return back()
			->with('message', 'Tag updated successfully.')
			->with('status', 'success');
	}

	/**
	 * Removes the specified resource from storage.
	 *
	 * @param  Request $request
	 * @param  string  $id
	 * @return View
	 */
	public function destroy(Request $request, string $id) : RedirectResponse
	{
		$row = Tag::findOrFail($id);
		$row->delete();
		Cache::forget('indexVarsAuth');
		Cache::forget('indexVarsGuest');

		if ($request->wantsJson()) {
			return response()->json(['message' => 'Tag deleted successfully.']);
		}
		return redirect(RouteServiceProvider::HOME)
			->with('message', 'Tag deleted successfully.')
			->with('status', 'success');
	}
}
