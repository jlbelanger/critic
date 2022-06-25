<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkController extends Controller
{
	/**
	 * Shows the form for creating a new resource.
	 *
	 * @param  Request $request
	 * @return View
	 */
	public function create(Request $request) : View
	{
		return view('works/create')
			->with('metaTitle', 'Add Work')
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
		$request->validate(Work::rules());
		$input = $request->input();
		$input['is_private'] = $request->has('is_private');
		if (empty($input['is_private'])) {
			$input['published_at'] = date('Y-m-d H:i:s');
		}
		$row = Work::create($input);
		if ($request->wantsJson()) {
			return response()->json(['message' => 'Work added successfully.']);
		}
		return redirect($row->editUrl())
			->with('message', 'Work added successfully.')
			->with('status', 'success');
	}

	/**
	 * Shows the form for editing the specified resource.
	 *
	 * @param  string $id
	 * @return View
	 */
	public function edit(string $id) : View
	{
		$row = Work::findOrFail($id);
		return view('works/edit')
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
		$row = Work::findOrFail($id);
		$request->validate(Work::rules($id));
		$input = $request->input();

		$input['is_private'] = $request->has('is_private');
		if (empty($input['published_at']) && empty($input['is_private'])) {
			$input['published_at'] = date('Y-m-d H:i:s');
		}

		$row->update($input);
		if ($request->wantsJson()) {
			return response()->json(['message' => 'Work updated successfully.']);
		}

		return back()
			->with('message', 'Work updated successfully.')
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
		$row = Work::findOrFail($id);
		$row->delete();
		if ($request->wantsJson()) {
			return response()->json(['message' => 'Work deleted successfully.']);
		}
		return redirect(RouteServiceProvider::HOME)
			->with('message', 'Work deleted successfully.')
			->with('status', 'success');
	}
}
