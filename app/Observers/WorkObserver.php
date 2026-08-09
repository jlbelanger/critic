<?php

namespace App\Observers;

use App\Models\Work;
use Illuminate\Support\Carbon;

class WorkObserver
{
	public function deleted(Work $work) : void
	{
		$work->slug = 'deleted-' . Carbon::now() . '-' . $work->slug;
		$work->save();
	}
}
