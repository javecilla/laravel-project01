<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 */
	public function run(): void {
		User::factory(1)->create();
		// $user = User::factory()->create([
		// 	'email' => 'javecilla@gmail.com',
		// 	'email_verified_at' => now(),
		// 	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		// 	'remember_token' => Str::random(10),
		// ]);

		Student::factory(1)->create();
		// $student = Student::factory(1)->create([
		// 	'user_id' => $user->uid,
		// 	'name' => 'Jerome Avecilla',
		// 	'year' => '1st year',
		// 	'course' => 'BS in Boybestfriend Execution',
		// 	'section' => 'Di kita gaganunin',
		// ]);

		//Post::factory(1)->create();
		// $post = Post::factory(1)->create([
		// 	'student_id' => $student->sid,
		// 	'description' => "Some quick example text to build on the card title and make up the bulk of the card's content.",
		// ]);

		//Comment::factory(1)->create();
		// Comment::factory(1)->create([
		// 	'post_id' => $post->pid,
		// 	'student_id' => $student->sid,
		// 	'context' => "Some quick example text to build on the card title and make up the bulk of the card's content.",
		// ]);
	}
}
