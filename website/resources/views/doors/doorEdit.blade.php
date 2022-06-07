@extends('layouts.layout')

@section('title', $title)

@section('main_content')
<form action="{{ route('doors.update', $door->id) }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-group mb-3">
		<label for="name" class="form-label">Door name</label>
		<input type="text" class="form-control" id="name" name="name" value="{{ $door->name }}" required>
	</div>

	<div class="form-group mb-3">
		<label for="status" class="form-label">Status</label>
		<select id="status" name="is_locked" class="form-select" aria-label="Default select example">
			<option value="0">Unlocked</option>
			<option value="1" {{ $door->is_locked == false ? '' : 'selected'}}>Locked</option>
		</select>
	</div>

	<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection