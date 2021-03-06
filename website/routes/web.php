<?php

use App\Http\Controllers\DoorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::middleware(['auth'])->group(function() {
	Route::resources([
		'/' => HomeController::class,
		'home' => HomeController::class,
		'doors' => DoorController::class,
	]);
});

Route::get('/prism-team', function () {
    return view('ourTeam');
});
