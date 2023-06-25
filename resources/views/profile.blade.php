@extends('layout')

@section('content')
	<div class="contain-small">
		@include('shared.errors', ['errors' => $errors])

		<form action="/profile" class="form" id="form" method="post">
			@method('PUT')
			@csrf

			<header class="form-row">
				<div class="form-label"></div>
				<div class="form-input">
					<h1>Profile</h1>
				</div>
			</header>

			<div class="form-row">
				<label class="form-label required" for="username">Username</label>
				<div class="form-input">
					<input
						autocapitalize="none"
						autocomplete="username"
						id="username"
						maxlength="255"
						name="username"
						required
						type="text"
						value="{{ old('username', !empty($row) ? $row->username : '') }}"
					/>
					@error('username')
						<span class="form-error">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="form-row">
				<label class="form-label required" for="email">Email</label>
				<div class="form-input">
					<input
						autocapitalize="none"
						autocomplete="email"
						id="email"
						maxlength="255"
						name="email"
						required
						type="email"
						value="{{ old('email', !empty($row) ? $row->email : '') }}"
					/>
					@error('email')
						<span class="form-error">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="form-row">
				<label class="form-label required" for="password">Current Password</label>
				<div class="form-input">
					<span class="password-container">
						<input
							autocomplete="current-password"
							autocorrect="off"
							class="password-input"
							id="password"
							name="password"
							required
							type="password"
						/>
						<button
							aria-controls="password"
							aria-label="Show Password"
							class="button--secondary password-button postfix"
							data-toggle-password
							type="button"
						>
							Show
						</button>
					</span>
					@error('password')
						<span class="form-error">{{ $message }}</span>
					@enderror
				</div>
			</div>
		</form>

		<footer class="form-footer">
			<button form="form" type="submit">Save</button>
		</footer>
	</div>
@stop
