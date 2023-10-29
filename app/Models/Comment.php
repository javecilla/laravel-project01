<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	use HasFactory;

	protected $primaryKey = 'cid';
	protected $fillable = ['post_id', 'student_id', 'context', 'created_at', 'updated_at'];

	// Display all the comment for the particular post (postID)
	public function allCommentsForStudentPost($postID) {
		//dd($postID);
		return Comment::where('post_id', $postID)
			->with('student') // Load the student relationship
			->latest()
			->get();
	}

	// To add new comment
	public function addNewCommentOnPost($comments, $postID, $studentID) {
		$result = $this->create([
			'post_id' => $postID,
			'student_id' => $studentID,
			'context' => $comments,
			'created_at' => now(),
			'updated_at' => NULL,
		]);
		if ($result) {
			return ['success' => true, 'message' => 'Commented successfully.'];
		}
		return ['success' => false, 'message' => 'Failed to comment on this post!'];
	}

	###[Methods for Database table relationship]

	// Make this 'comments' table have relationship to 'students' table
	public function student() {
		return $this->belongsTo(Student::class, 'student_id', 'sid')->withDefault([
			'name' => 'Guest Student', //set the default commentor to guest students
		]);
	}

	// Make this 'comments' table have relationship to 'posts' table
	public function post() {
		return $this->belongsTo(Post::class, 'post_id', 'pid');
	}
}
