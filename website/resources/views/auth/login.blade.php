@extends('layouts.layout')

@section('main_content')
<div class="login-box">
	<h2>Login</h2>
	<form id="formLogin" method="POST" action="{{ route('login') }}">
		@csrf

		<div class="user-box">
			<input id="email" type="email" name="email" value="{{ old('email') }}" required>
			<label>Email</label>
		</div>
		<div class="user-box">
			<input id="password" type="password" name="password" required>
			<label>Password</label>
		</div>
		<div>
			<a class="auth" href="{{ route('register') }}">Register Here</a>
		</div>
		<a class="submit" onclick="document.getElementById('formLogin').submit()">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			Login
		</a>
	</form>
</div>
@endsection
