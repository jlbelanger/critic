@extends('layout')

@section('content')
	<div id="auth">
		<h1>Reset password</h1>

		@include('shared.errors', ['errors' => $errors])

		<form action="/reset-password" method="post">
			@csrf

			<input type="hidden" name="token" value="{{ $request->route('token') }}">

			<p>
				<label class="required" for="email">Email</label>
				<input autocomplete="email" id="email" name="email" required type="email" value="{{ old('email', $request->email) }}" />
			</p>

			<p>
				<label class="required" for="password">New password</label>
				<span class="password-container">
					<input
						autocomplete="new-password"
						autocorrect="off"
						autofocus
						class="password-input"
						id="password"
						name="password"
						required
						type="password"
					/>
					<button aria-label="Show Password" class="button--secondary password-button" data-toggle-password type="button">Show</button>
				</span>
			</p>

			<p>
				<label class="required" for="password_confirmation">Confirm new password</label>
				<span class="password-container">
					<input
						autocomplete="new-password"
						autocorrect="off"
						class="password-input"
						id="password_confirmation"
						name="password_confirmation"
						required
						type="password"
					/>
					<button aria-label="Show Password" class="button--secondary password-button" data-toggle-password type="button">Show</button>
				</span>
			</p>

			<p>
				<button type="submit">Reset password</button>
			</p>
		</form>
	</div>
@stop
