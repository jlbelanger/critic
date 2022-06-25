@extends('layout')

@section('content')
	<div class="contain">
		<h1>{{ $row->title }} <small>(<span data-filterable-num>{{ number_format($works->count()) }}</span>)</small></h1>

		@include('shared.table')
	</div>
@stop
