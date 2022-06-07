<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return redirect(route('home.index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title = 'Add a door';
		return view('doors.doorCreate', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|string',
			'is_locked' => 'required|boolean',
		]);

		Door::create([
			'user_id' => Auth::id(),
			'name' => $validated['name'],
			'is_locked' => $validated['is_locked'],
		]);

		return redirect(route('home.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($doorId)
	{
		$title = 'Door Detail';
		return view('doors.doorShow', compact('title'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($doorId)
	{
		$title = 'Edit a door';

		$door = Door::getDoorById($doorId);

		return view('doors.doorEdit', compact('title', 'door'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $doorId)
	{
		$validated = $request->validate([
			'name' => 'required|string',
			'is_locked' => 'required|boolean',
		]);

		DB::table('doors')
			->where('id', $doorId)
			->update([
				'name' => $validated['name'],
				'is_locked' => $validated['is_locked'],
			]);

		return redirect(route('home.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($doorId)
	{
		$door = Door::getDoorById($doorId);
		$door->delete();

		return redirect(route('home.index'));
	}
}
