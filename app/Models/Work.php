<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
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
		'short_title',
	];

	public function date() : string
	{
		$date = $this->start_date;
		if (!$date) {
			return '';
		}

		$len = strlen($date);
		if ($len === 4) {
			$format = 'Y';
			$date .= '-01-01';
		} elseif ($len === 7) {
			$format = 'F Y';
			$date .= '-01';
		} else {
			$format = 'F j, Y';
		}

		return date($format, strtotime($date));
	}

	public function editUrl() : string
	{
		return '/works/' . $this->id . '/edit';
	}

	public function rules(string $id = '') : array
	{
		$unique = $id ? ',' . $id : '';
		$required = $id ? 'filled' : 'required';
		return [
			'type' => [$required, 'in:Album,Book,Movie,Tv'],
			'title' => [$required, 'max:255'],
			'start_release_year' => ['nullable', 'digits:4'],
			'end_release_year' => ['nullable', 'digits:4'],
			'slug' => [$required, 'max:255', 'alpha_dash', 'unique:works,slug' . $unique],
			'is_private' => ['boolean'],
			'is_favourite' => ['boolean'],
			'rating' => ['nullable', 'numeric', 'gte:0', 'lte:5'],
			'start_date' => ['nullable', 'regex:/^\d{4}(-\d{2})?(-\d{2})?$/'],
			'end_date' => ['nullable', 'regex:/^\d{4}(-\d{2})?(-\d{2})?$/'],
			'published_at' => ['nullable', 'date_format:"Y-m-d H:i:s"'],
			'short_title' => ['nullable', 'max:255'],
		];
	}

	public function setContentAttribute($value)
	{
		$value = preg_replace('/<(p|li|blockquote|ul|ol|h1|h2|h3|h4|h5|h6|hr|pre|figure|figcaption|table|tr|td|th|dl|dt|dd|div)( [^>]+)?>/', "\n" . '<$1$2>', $value);
		$value = str_replace('</blockquote>', "\n" . '</blockquote>', $value);
		$this->attributes['content'] = trim($value);
	}

	public function tags() : BelongsToMany
	{
		return $this->belongsToMany(Tag::class)
			->orderBy(\DB::raw('COALESCE(short_title, title)'));
	}

	public function title() : string
	{
		return $this->short_title ? $this->short_title : $this->title;
	}

	public function url() : string
	{
		return '/' . Str::plural(strtolower($this->type)) . '/' . $this->slug;
	}

	public static function visible() : Builder
	{
		if (!Auth::user()) {
			return self::where('is_private', '=', 0);
		}
		return (new self)->newQuery();
	}

	public function year() : string
	{
		$output = '';
		if ($this->start_release_year) {
			$output .= $this->start_release_year;
		}
		if ($this->type === 'Tv' && $this->start_release_year !== $this->end_release_year) {
			$output .= '–' . $this->end_release_year;
		}
		return $output;
	}
}
