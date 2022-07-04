@extends('layout')

@section('content')
	<div class="contain">
		<h1 class="{{ $works->isEmpty() ? 'content-title--no-results' : '' }}" id="content-title">
			{{ $metaTitle }}
			<small>(<span data-filterable-num>{{ number_format($works->count()) }}</span>)</small>
		</h1>

		@include(
			'shared.table',
			[
				'showAuthor' => in_array($metaTitle, ['Books', 'Albums']),
				'authorTitle' => $metaTitle === 'Albums' ? 'Artist' : 'Author',
				'longYear' => $metaTitle === 'TV Shows',
				'defaultSortKey' => $defaultSortKey,
			]
		)
	</div>
@stop
