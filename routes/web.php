<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
// 	return view('welcome');
// });

/**
 * Common Resources Router:Naming Convention:
 *  index() - Show all data
 *  show() - Show single data
 *  create() - Show form to create new data
 *  store() - Store data submit in form
 *  edit() - Show form to edit existing data
 *  update() - Save the changes in form updated
 *  destroy() - Delete existing data
 */

// Show all aata
Route::get('/', [StudentsController::class, 'index']);
// Grouping or prefix all get request contains '/students/'
Route::group(['prefix' => 'students'], function () {
	// Show single data
	Route::get('/forum/{studentId}/',
		[StudentsController::class, 'show']);

	// Registration student
	# Submit the data from registration form
	Route::post('/registration/',
		[StudentsController::class, 'store']);
	# Show the registration form
	Route::get('/registration/',
		[StudentsController::class, 'create']);
});

// Login Portal
Route::get('/auth/login/',
	[StudentsController::class, 'loginPortal']);
