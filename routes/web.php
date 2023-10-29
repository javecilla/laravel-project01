<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
// Route::get('/', [HomeController::class, 'test']);
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

# Show all data
Route::get('/', [HomeController::class, 'index']);
#Show single student post
Route::get('/student/post/{postId}', [HomeController::class, 'show']);
# Show the registration form
Route::get('/students/registration', [HomeController::class, 'create'])->middleware('guest');
# Submit the data from registration form
Route::post('/students/registration', [HomeController::class, 'store'])->middleware('guest');

# Show Login form
Route::get('/auth/login',
	[UserController::class, 'create'])->name('login')->middleware('guest');
# To login in the user
Route::post('/users/autheticate', [UserController::class, 'authenticate']);
# To logout user
Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');

# Show posts feed of student
Route::get('/student/posts', [StudentController::class, 'index'])->middleware('auth');
# Show profile
Route::get('/student/profile', [StudentController::class, 'edit'])->middleware('auth');
# Update user account
Route::put('/update/account', [StudentController::class, 'updateAccount'])->middleware('auth');
# Update student information
Route::put('/update/information', [StudentController::class, 'updateInformation'])->middleware('auth');
# Submit the comments as guest
Route::post('/comment/post', [StudentController::class, 'storeComment']);
# Submit the comments as guest
Route::post('/create/post', [StudentController::class, 'storePost']);
