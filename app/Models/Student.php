<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	use HasFactory;
	//Use own primary key instead of primary by Laravel
	protected $primaryKey = 'sid';
	//Specify the field column in database table 'students' that is fillable
	protected $fillable = ['user_id', 'name', 'year', 'course', 'section', 'profile'];

	// To add new student
	public function addStudentInformation(array $attributes) {
		$result = $this->create($attributes);
		if ($result) {
			return ['success' => true, 'message' => 'Your registration has been completed successfully.'];
		}
		return ['success' => false, 'message' => 'Failed to register!'];
	}

	// To update student
	public function updateStudentInformation(array $attributes) {
		$result = $this->update($attributes);
		if ($result) {
			return ['success' => true, 'message' => 'Your Information updated successfully.'];
		}
		return ['success' => false, 'message' => 'Failed to update information.'];
	}

	###[[Methods for Database table relationship]

	// Make this 'students' table have relationship to 'users' table
	public function user() {
		return $this->belongsTo(User::class, 'user_id', 'uid');
	}

	// Make this 'students' table have relationship to 'posts' table
	public function posts() {
		return $this->hasMany(Post::class, 'student_id', 'sid');
	}

	// Make this 'students' table have relationship to 'comments' table
	public function comments() {
		return $this->hasMany(Comment::class, 'student_id', 'sid');
	}
}
