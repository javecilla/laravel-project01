<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateComment extends FormRequest {
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
			'post_id' => 'required|numeric',
			'comment' => 'required',
		];
	}

	/**
	 * Set custom error message
	 * @return [string]
	 */
	public function messages() {
		return [
			'post_id.required' => 'Something went wrong! Missing post id.',
			'post_id.numeric' => 'Something went wrong! Invalid data type post id',
			'comment.required' => 'Comments is required! Please enter any comment before to submit.',
		];
	}
}
