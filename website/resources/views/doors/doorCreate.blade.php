@extends('layouts.layout')

@section('title', $title)

@section('main_content')
<form action="{{ route('doors.store') }}" method="POST">
	@csrf

	<div class="form-group mb-3">
		<label for="name" class="form-label">Door name</label>
		<input type="text" class="form-control" id="name" name="name" required>
	</div>

	<div class="form-group mb-3">
		<label for="status" class="form-label">Status</label>
		<select id="status" name="is_locked" class="form-select" aria-label="Default select example">
			<option value="0" selected>Unlocked</option>
			<option value="1">Locked</option>
		</select>
	</div>

	<button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection