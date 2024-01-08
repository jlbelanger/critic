@extends('layout')

@section('content')
	<div class="contain-small">
		@include('shared.errors', ['errors' => $errors])

		<form action="/tags" class="form" data-form id="form" method="post">
			<header class="form-row">
				<div class="form-label"></div>
				<div class="form-input"><h1>Add Tag</h1></div>
			</header>

			@include('tags.form')
		</form>

		<footer class="form-footer">
			<button form="form" type="submit">Save</button>
		</footer>
	</div>
@stop
