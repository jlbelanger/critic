<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'title',
		'short_title',
		'slug',
		'is_private',
		'hide_from_cloud',
	];

	public function rules(string $id = '') : array
	{
		$required = $id ? 'filled' : 'required';
		return [
			'title' => [$required, 'max:255'],
			'short_title' => ['max:255'],
			'slug' => [$required, 'max:255', 'alpha_dash'],
			'is_private' => ['boolean'],
			'hide_from_cloud' => ['boolean'],
		];
	}

	public function url() : string
	{
		return '/tags/' . $this->slug;
	}
}
