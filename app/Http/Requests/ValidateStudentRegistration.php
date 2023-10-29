<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateStudentRegistration extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array {
		return [
			'fullName' => 'required',
			'yearLevel' => 'required',
			'course' => 'required',
			'section' => 'required',
			'password' => ['required', 'confirmed', 'min:8'],
			'email' => ['required', 'email', Rule::unique('users', 'email')],
			'profile' => 'mimes:png,jpg,jpeg|max:5120', // 5120 KB = 5MB
		];
	}

	/**
	 * Set custom error message
	 * @return [string]
	 */
	public function messages() {
		return [
			'fullName.required' => 'Full name is required! Please enter your full name.',
			'yearLevel.required' => 'Year level is required! Please select your year level.',
			'course.required' => 'Course is required! Please select your course.',
			'section.required' => 'Section is required! Please select your section.',
			'password.required' => 'Password is required! Please enter your password.',
			'password.confirmed' => 'Password and confirm password does not match!',
			'password.min' => 'Your password is too short! Password should be at least 8 characters.',
			'email.required' => 'Email is required! Please enter your email.',
			'email.email' => 'Invalid email address! Please enter a valid email address',
			'email.unique' => 'Email is already taken! Please choose a different one.',
			'profile.mimes' => 'Invalid image format. Only .png, .jpg, or .jpeg formats are allowed.',
			'profile.max' => 'Image size should be below 5MB.',
		];
	}
}
