<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

	public function asJsonArray() : array
	{
		return [
			'id' => (string) $this->id,
			'url' => $this->url(),
			'title' => $this->title,
		];
	}

	public function editUrl() : string
	{
		return '/tags/' . $this->id . '/edit';
	}

	public static function rules(string $id = '') : array
	{
		$unique = $id ? ',' . $id : '';
		$required = $id ? 'filled' : 'required';
		return [
			'title' => [$required, 'max:255'],
			'short_title' => ['max:255'],
			'slug' => [$required, 'max:255', 'alpha_dash', 'unique:tags,slug' . $unique],
			'is_private' => ['boolean'],
			'hide_from_cloud' => ['boolean'],
		];
	}

	public function title() : string
	{
		return $this->short_title ? $this->short_title : $this->title;
	}

	public function url() : string
	{
		return '/tags/' . $this->slug;
	}

	public function works() : BelongsToMany
	{
		return $this->belongsToMany(Work::class);
	}
}
