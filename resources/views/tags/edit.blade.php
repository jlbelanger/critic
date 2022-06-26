@extends('layout')

@section('content')
	<div class="contain-small">
		@include('shared.errors', ['errors' => $errors])

		<form action="/tags/{{ $row->id }}" class="admin" data-confirmable="Are you sure you want to delete this tag?" id="delete-form" method="post">
			@csrf
			@method('DELETE')
		</form>

		<form action="/tags/{{ $row->id }}" class="form" id="form" method="post">
			@method('PUT')

			<header class="form-row">
				<div class="form-label"></div>
				<div class="form-input">
					<h1>Edit Tag</h1>
					<button class="button--danger" form="delete-form" type="submit">Delete</button>
				</div>
			</header>

			@include('tags.form', ['row' => $row])
		</form>

		<footer class="form-footer">
			<button form="form" type="submit">Save</button>
		</footer>
	</div>
@stop