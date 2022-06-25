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

	public function editUrl() : string
	{
		return '/works/' . $this->id . '/edit';
	}

	public function rules(string $id = '') : array
	{
		$required = $id ? 'filled' : 'required';
		return [
			'type' => [$required, 'in:Album,Book,Movie,Tv'],
			'title' => [$required, 'max:255'],
			'start_release_year' => ['nullable', 'digits:4'],
			'end_release_year' => ['nullable', 'digits:4'],
			'slug' => [$required, 'max:255', 'alpha_dash'],
			'is_private' => ['boolean'],
			'is_favourite' => ['boolean'],
			'rating' => ['nullable', 'numeric', 'gte:0', 'lte:5'],
			'start_date' => ['nullable', 'date_format:Y-m-d'],
			'end_date' => ['nullable', 'date_format:Y-m-d'],
			'published_at' => ['nullable', 'date_format:"Y-m-d H:i:s"'],
		];
	}

	public function url() : string
	{
		return '/' . Str::plural(strtolower($this->type)) . '/' . $this->slug;
	}
}
