<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePost extends FormRequest {
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
			'post' => 'required',
		];
	}

	/**
	 * Set custom error message
	 * @return [string]
	 */
	public function messages() {
		return [
			'post.required' => 'Post is required! Please enter any post before to submit.',
		];
	}
}
