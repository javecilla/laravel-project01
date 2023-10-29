<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdatingInformation extends FormRequest {
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
			'student_id' => 'required|numeric',
			'profile' => 'mimes:png,jpg,jpeg|max:5120', // 5120 KB = 5MB
		];
	}

	/**
	 * Set custom error message
	 * @return [string]
	 */
	public function messages() {
		return [
			'student_id.required' => 'Something went wrong! Missing user id.',
			'student_id.numeric' => 'Something went wrong! Invalid data type user id',
			'profile.mimes' => 'Invalid image format. Only .png, .jpg, or .jpeg formats are allowed.',
			'profile.max' => 'Image size should be below 5MB.',
		];
	}
}
