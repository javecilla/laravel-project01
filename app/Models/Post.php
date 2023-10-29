<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	use HasFactory;

	protected $primaryKey = 'pid';
	protected $fillable = ['student_id', 'description', 'created_at', 'updated_at'];

	// To add new post
	public function addNewPost($studentID, $post) {
		$result = $this->create([
			'student_id' => $studentID,
			'description' => $post,
			'created_at' => now(),
			'updated_at' => NULL,
		]);
		if ($result) {
			return ['success' => true, 'message' => 'Commented successfully.'];
		}
		return ['success' => false, 'message' => 'Failed to comment on this post!'];
	}

	// Display and filter all students post
	public function filterAllStudentsPosts(array $filters) {
		$query = Post::with('student.user')->latest();

		// Filter the posts of students by 'course'
		if ($filters['course'] ?? false) {
			$query->whereHas('student', function ($studentQuery) use ($filters) {
				$studentQuery->where('course', 'like', '%' . $filters['course'] . '%');
			});
		}

		// Filter the posts of students by 'section'
		if ($filters['section'] ?? false) {
			$query->whereHas('student', function ($studentQuery) use ($filters) {
				$studentQuery->where('section', 'like', '%' . $filters['section'] . '%');
			});
		}

		// Filter the posts of students by 'year'
		if ($filters['year'] ?? false) {
			$query->whereHas('student', function ($studentQuery) use ($filters) {
				$studentQuery->where('year', 'like', '%' . $filters['year'] . '%');
			});
		}

		// Filter the posts of students by search input 'students->name' and 'post->description'
		if ($filters['search'] ?? false) {
			$query->where(function ($postQuery) use ($filters) {
				$postQuery->orWhere('description', 'like', '%' . $filters['search'] . '%')
					->orWhereHas('student', function ($studentQuery) use ($filters) {
						$studentQuery->where('name', 'like', '%' . $filters['search'] . '%');
					});
			});
		}

		return $query->paginate(8);
	}

	// Display single student post
	public static function getStudentPost($postId) {
		//dd($postId);
		$query = Post::with('student.user')
			->latest()
			->where('pid', $postId);

		return $query->first(); // Use 'first' to get a single post
		// $post = Post::with('student.user')->find($postId);
		// return $post;
	}

	###[Methods for Database table relationship]

	// Make this 'posts' table have relationship to 'students' table
	public function student() {
		return $this->belongsTo(Student::class, 'student_id', 'sid');
	}

	// Make this 'post' table have relationship to 'comments' table
	public function comments() {
		return $this->hasMany(Comment::class, 'post_id', 'pid');
	}
}
