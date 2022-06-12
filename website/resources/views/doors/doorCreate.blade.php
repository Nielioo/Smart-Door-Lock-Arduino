@extends('layouts.layout')

@section('title', $title)

@section('main_content')
<div class="login-box">
	<h2>Add a Door</h2>
	<form id="formAdd" action="{{ route('doors.store') }}" method="POST" novalidate>
		@csrf

		<div class="user-box">
			<input id="name" type="text" name="name" value="{{ old('name') }}" required>
			<label>Door name</label>
		</div>

		{{-- <div class="form-group mb-3">
			<label for="status" class="form-label white">Status</label>
			<select id="status" name="is_locked" class="form-select" aria-label="Default select example">
				<option value="0" selected>Unlocked</option>
				<option value="1">Locked</option>
			</select>
		</div> --}}

		<div class="user-box">
			<input id="password" type="password" name="password" required>
			<label>Door password</label>
		</div>

		<a class="submit" onclick="document.getElementById('formAdd').submit()">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			Add
		</a>
	</form>
</div>
@endsection