<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRegistrationRequest;
use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller {
	//Display a list of students and filter them based on user input.
	public static function index(Student $student) {
		$filterRequest = request()->only(['course', 'section', 'year', 'search']);
		$students = $student->filterStudents($filterRequest);

		return view('student.index', compact('students'));
	}

	//Using Route Model Binding
	public static function show(Student $studentId) {
		return view('student.show', [
			'student' => $studentId,
		]);
	}

	// Show the student registration form
	public static function create() {
		return view('student.create');
	}

	// Store the student data submitted in registration form
	public static function store(StudentRegistrationRequest $request,
		Student $student,
		Account $account) {
		// If The request has already been validated
		DB::beginTransaction();
		try {
			// Insert student information
			$studentData = $student->addStudentInformation(
				$request->input('fullName'),
				$request->input('yearLevel'),
				$request->input('course'),
				$request->input('section')
			);

			// Insert account data
			$account->addStudentAccount(
				$studentData->sid, // Use the ID of the newly created student
				$request->input('username'),
				$request->input('password')
			);

			DB::commit(); // Commit the transaction

			// Redirect to the same after successful transaction
			return redirect('/students/registration/')
				->with('success', 'Your registration has been completed successfully.');
		} catch (\PDOException $e) {
			DB::rollBack(); // If an exception occurs, roll back the transaction

			// Handle the exception or return an error response
			return back()
				->withInput() // Retain user input
				->with('error', 'An error occurred while processing your request.');
		}
	}

	public static function loginPortal() {
		return view('auth.login');
	}
}
