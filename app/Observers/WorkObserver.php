<?php

namespace App\Observers;

use App\Models\Work;
use Illuminate\Support\Carbon;

class WorkObserver
{
	/**
	 * @param  Work $work
	 * @return void
	 */
	public function deleted(Work $work)
	{
		$work->slug = 'deleted-' . Carbon::now() . '-' . $work->slug;
		$work->save();
	}
}
