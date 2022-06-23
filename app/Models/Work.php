<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Work extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'type',
		'title',
		'start_release_year',
		'end_release_year',
		'slug',
		'content',
		'is_private',
		'is_favourite',
		'rating',
		'start_date',
		'end_date',
		'author',
		'published_at',
	];

	public function rules(string $id = '') : array
	{
		$required = $id ? 'filled' : 'required';
		return [
			'type' => [$required, 'in:Album,Book,Movie,Tv'],
			'title' => [$required, 'max:255'],
			'start_release_year' => ['digits:4'],
			'end_release_year' => ['digits:4'],
			'slug' => [$required, 'max:255', 'alpha_dash'],
			'is_private' => ['boolean'],
			'is_favourite' => ['boolean'],
			'rating' => ['numeric', 'gte:0', 'lte:5'],
			'start_date' => ['date_format:Y-m-d'],
			'end_date' => ['date_format:Y-m-d'],
			'published_at' => ['date_format:"Y-m-d H:i:s"'],
		];
	}

	public function url() : string
	{
		return '/' . Str::plural(strtolower($this->type)) . '/' . $this->slug;
	}
}
