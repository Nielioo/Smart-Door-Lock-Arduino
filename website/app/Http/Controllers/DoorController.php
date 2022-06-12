<?php

namespace App\Http\Controllers;

use App\Models\Door;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
			'password' => 'required',
		]);

		Door::create([
			'user_id' => Auth::id(),
			'name' => $validated['name'],
			'password' => Hash::make($validated['password']),
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
		//
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
			'name' => 'nullable',
			'is_locked' => 'required|boolean',
			'password' => 'nullable'
		]);

		$door = Door::getDoorById($doorId);

		# Possibly changing status
		if (empty($validated['name'])) {
			// Change door status
			if (!empty($validated['password'])) {
				if (Hash::check($validated['password'], $door->password)) {
					$door->is_locked = $validated['is_locked'];

					$door->save();
				}

				return redirect(route('home.index'));
			}

			// Invalid edit
			return redirect()->back();
		}

		// Definitely from edit
		$door->name = $validated['name'];

		// Change password
		if (!empty($validated['password'])) {
			$door->password = Hash::make($validated['password']);
		}

		$door->save();

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
