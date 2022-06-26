@extends('layout')

@section('content')
	<div class="contain">
		<h1 class="{{ $works->isEmpty() ? 'content-title--no-results' : '' }}" id="content-title">
			{{ $row->title }}
			<small>(<span data-filterable-num>{{ number_format($works->count()) }}</span>)</small>
		</h1>

		@include('shared.table')
	</div>
@stop
