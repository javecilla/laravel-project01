<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateComment;
use App\Http\Requests\ValidatePost;
use App\Http\Requests\ValidateUpdatingAccount;
use App\Http\Requests\ValidateUpdatingInformation;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;

class StudentController extends Controller {
	// Show the dashboard
	public static function index(Post $post) {
		$requestFilter = request()->only(['course', 'section', 'year', 'search']);
		$posts = $post->filterAllStudentsPosts($requestFilter);
		return view('student.index', compact('posts'));
	}

	// Create comment to the particular post
	public static function storeComment(ValidateComment $request, Comment $comment) {
		//$student = $request->user()->students->first();
		//check this who comment on this post in logged in or not
		$user = $request->user();
		$userStudentId = $user ? $user->uid : null;
		$insert = $comment->addNewCommentOnPost(
			$request->input('comment'),
			$request->input('post_id'),
			$userStudentId,
		);
		return redirect('/student/post/' . $request->input('post_id'))
			->with(($insert['success']) ? 'success' : 'error', $insert['message']);
	}

	// Create new post
	public static function storePost(ValidatePost $request, Post $post) {
		$user = $request->user();
		$userStudentId = $user ? $user->uid : null;
		$insert = $post->addNewPost(
			$userStudentId,
			$request->input('post'),
		);
		return redirect('/student/posts/')
			->with(($insert['success']) ? 'success' : 'error', $insert['message']);
	}

	// Show the update form profile data for the user->student who is currently login
	public static function edit(Request $request) {
		// Get the authenticated user
		// Use the $user instance for various operations
		$student = $request->user()->students->first();
		// $student = auth()->user()->students->first();
		return view('student.edit', compact('student'));
	}

	// To update account
	public function updateAccount(ValidateUpdatingAccount $request) {
		// Method injection: Get the authenticated user or
		// user who currently logged in
		$user = $request->user();

		// Verify the old password
		$verify = $user->verifyPassword($request->input('password_old'));
		if (!$verify['success']) {
			return back()->withInput()
				->onlyInput('password_old')
				->withErrors(['password_old' => $verify['message']]);
		}

		// Update the user's email and password
		$update = $user->updateUserAccount($request->input('email'), $request->input('password_new'));

		return redirect('/student/profile')
			->with(($update['success']) ? 'success' : 'error', $update['message']);
	}

	// To update student information
	public function updateInformation(ValidateUpdatingInformation $request) {
		$student = $request->user()->students->first();

		$attributes = [
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

		$update = $student->updateStudentInformation($attributes);

		return redirect('/student/profile')
			->with(($update['success']) ? 'success' : 'error', $update['message']);
	}
}
