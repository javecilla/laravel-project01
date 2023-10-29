<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLoginForm;
use Illuminate\Http\Request;

class UserController extends Controller {
	// To show login form
	public static function create() {
		return view('auth.create');
	}

	// To login the user
	public static function authenticate(ValidateLoginForm $request) {
		// If login form validated success,
		$user = $request->only('email', 'password');

		// then start validate user credentials agains the database
		if (auth()->attempt($user)) {
			$request->session()->regenerate();
			return redirect('/student/posts/')->with('success', 'Welcome back ' . $request['email']);
		}

		return back()->withInput()
			->withErrors(['email' => 'Invalid Credentials! Please try again.'])
			->onlyInput('email');
	}

	// To logout the user
	public static function logout(Request $request) {
		auth()->logout(); //logout

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/auth/login/');
	}
}
