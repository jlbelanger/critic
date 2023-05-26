@extends('layout')

@section('content')
	<div class="contain-small">
		@include('shared.errors', ['errors' => $errors])

		<form action="/works/{{ $row->id }}" class="admin" id="delete-form" method="post">
			@csrf
			@method('DELETE')
		</form>

		<form action="/works/{{ $row->id }}" class="form" id="form" method="post">
			@method('PUT')

			<header class="form-row">
				<div class="form-label"></div>
				<div class="form-input">
					<h1>Edit Work</h1>
					<button class="button--danger" data-confirmable="Are you sure you want to delete this work?" form="delete-form" type="button">
						Delete
					</button>
				</div>
			</header>

			@include('works.form', ['row' => $row])
		</form>

		<footer class="form-footer">
			<button form="form" type="submit">Save</button>
		</footer>
	</div>
@stop
