<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdatingAccount extends FormRequest {
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
			'user_id' => 'required|numeric',
			'email' => 'required|email',
			'password_old' => 'required',
			'password_new' => 'required|min:8',
		];
	}

	/**
	 * Set custom error message
	 * @return [string]
	 */
	public function messages() {
		return [
			'user_id.required' => 'Something went wrong! Missing user id.',
			'user_id.numeric' => 'Something went wrong! Invalid data type user id',
			'email.required' => 'Email is required! Please enter your email.',
			'email.email' => 'Invalid email address! Please enter a valid email address',
			'password_old.required' => 'Old password is required! Please enter old password.',
			'password_new.required' => 'Password is required! Please enter your password.',
			'password_new.min' => 'Your password is too short! Password should be at least 8 characters.',

		];
	}
}
