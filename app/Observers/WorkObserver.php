<?php

namespace App\Observers;

use App\Models\Work;

class WorkObserver
{
	/**
	 * @param  Work $work
	 * @return void
	 */
	public function deleted(Work $work)
	{
		$work->slug = 'deleted-' . strtotime('now') . '-' . $work->slug;
		$work->save();
	}
}
