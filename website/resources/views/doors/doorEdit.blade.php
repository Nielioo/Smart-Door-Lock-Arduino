@extends('layouts.layout')

@section('title', $title)

@section('main_content')
<div class="login-box">
	<h2>Edit {{ $door->name }}</h2>
	<form id="formEdit" action="{{ route('doors.update', $door->id) }}" method="POST">
		@csrf
		@method('PATCH')

		<input type="hidden" name="is_locked" value="{{ $door->is_locked }}">

		<div class="user-box">
			<input id="name" type="text" name="name" value="{{ $door->name }}" required>
			<label>Door name</label>
		</div>
		
		{{-- <div class="form-group mb-3">
			<label for="status" class="form-label white">Status</label>
			<select id="status" name="is_locked" class="form-select" aria-label="Default select example">
				<option value="0">Unlocked</option>
				<option value="1" {{ $door->is_locked == false ? '' : 'selected'}}>Locked</option>
			</select>
		</div> --}}
		
		<div class="user-box">
			<input id="password" type="password" name="password" required>
			<label>New password</label>
		</div>

		<a class="submit" onclick="document.getElementById('formEdit').submit()">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			Save
		</a>
	</form>
</div>
@endsection