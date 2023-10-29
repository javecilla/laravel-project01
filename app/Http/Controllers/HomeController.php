<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateStudentRegistration;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
	// public static function test() {
	// 	$posts = Post::all();
	// 	return view('test.index', compact('posts'));
	// }

	public static function index(Post $post) {
		$requestFilter = request()->only(['course', 'section', 'year', 'search']);
		$posts = $post->filterAllStudentsPosts($requestFilter);

		return view('home.index', compact('posts'));
	}

	// To show specific student post by id with comments
	public static function show(Comment $comment, $postId) {
		// Get the specific post
		$post = Post::find($postId);
		// Get the comments for this post
		$comments = $comment->allCommentsForStudentPost($postId);

		return view('home.show', compact('post', 'comments'));
	}

	// To show the student registration form
	public static function create() {
		return view('home.create');
	}

	// Store the student data submitted in the registration form
	public static function store(ValidateStudentRegistration $request, Student $student, User $user) {
		// If the request has already been validated
		DB::beginTransaction();

		try {
			// Insert account data
			$userData = $user->addUserAccount($request->input('email'), $request->input('password'));

			$attributes = [
				'user_id' => $userData->uid,
				'name' => $request->input('fullName'),
				'year' => $request->input('yearLevel'),
				'course' => $request->input('course'),
				'section' => $request->input('section'),
			];

			// Check if there is a profile image submitted
			if ($request->hasFile('profile')) {
				$profilePath = $request->file('profile')->store('profiles', 'public');
				$attributes['profile'] = $profilePath;
			}

			// Insert student information
			$insert = $student->addStudentInformation($attributes);

			DB::commit(); // Commit the transaction

			// Redirect to the same page after successful transaction
			return redirect('/students/registration/')
				->with(($insert['success']) ? 'success' : 'error', 'Your registration has been completed successfully.');
		} catch (\PDOException $e) {
			DB::rollBack(); // If an exception occurs, roll back the transaction

			// Handle the exception or return an error response
			// Retain user input
			return back()->withInput()->with('error', 'Something went wrong!');
			//->with('error', $e->getMessage())
		}
	}
}
