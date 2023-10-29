<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateLoginForm extends FormRequest {
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
			'email' => ['required', 'email'],
			'password' => 'required',
		];
	}

	/**
	 * Set custom error message
	 * @return [string]
	 */
	public function messages() {
		return [
			'email.required' => 'Email is required! Please enter your email.',
			'email.email' => 'Invalid email address! Please enter a valid email address',
			'password.required' => 'Password is required! Please enter your password.',
		];
	}
}
