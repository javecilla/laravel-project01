<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRegistrationRequest extends FormRequest {
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
			'username' => ['required', Rule::unique('accounts', 'username')],
			'password' => 'required',
		];
	}

	public function messages() {
		return [
			'fullName.required' => 'The full name is required.',
			'yearLevel.required' => 'The year level is required.',
			'course.required' => 'The course is required.',
			'section.required' => 'The section is required.',
			'username.required' => 'The username is required.',
			'username.unique' => 'The username is already taken. Please choose a different one.',
			'password.required' => 'The password is required.',
		];
	}
}
