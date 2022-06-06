@extends('layouts.layout')

@section('main_content')
<div class="login-box">
	<h2>Register</h2>
	<form id="formRegister" method="POST" action="{{ route('register') }}">
		@csrf

		<div class="user-box">
			<input id="name" type="text" name="name" value="{{ old('name') }}" required>
			<label>Name</label>
		</div>
		<div class="user-box">
			<input id="email" type="email" name="email" value="{{ old('email') }}" required>
			<label>Email</label>
		</div>
		<div class="user-box">
			<input id="password" type="password" name="password" required>
			<label>Password</label>
		</div>
		<div class="user-box">
			<input id="password-confirm" type="password" name="password_confirmation" required>
			<label>Password Confirmation</label>
		</div>
		<div>
			<a class="auth" href="{{ route('login') }}">Login Here</a>
		</div>
		<a class="submit" onclick="document.getElementById('formRegister').submit()">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			Register
		</a>
	</form>
</div>
@endsection
