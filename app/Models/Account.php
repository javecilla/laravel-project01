<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model {
	//Use own primary key instead of primary by Laravel
	protected $primaryKey = 'aid';

	//Specify the field column in database table 'accounts' that is fillable
	protected $fillable = ['student_id', 'username', 'password'];

	//Insert the student account information
	public function addStudentAccount($studentId, $username, $password) {
		return $this->create([
			'student_id' => $studentId,
			'username' => $username,
			'password' => bcrypt($password), //hash the password
		]);
	}

	use HasFactory;
}
