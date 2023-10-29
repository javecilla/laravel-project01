<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the Model class
use Illuminate\Database\Eloquent\Model; // Import HasFactory
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
	use HasFactory, Notifiable, HasApiTokens;

	//Use own primary key instead of primary by Laravel
	protected $primaryKey = 'uid';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'updated_at',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];

	// Insert the student account information
	public function addUserAccount($email, $password) {
		return $this->create([
			'email' => $email,
			'email_verified_at' => now(),
			'password' => Hash::make($password), //hash the password bcrypt($password)
			'remember_token' => Str::random(10),
		]);
	}

	// Validate password
	public function verifyPassword($inputPassword) {
		if (Hash::check($inputPassword, $this->password)) {
			return ['success' => true, 'message' => ''];
		}
		return ['success' => false, 'message' => 'Invalid Credentials! Please try again.'];
	}

	// To update the user account
	public function updateUserAccount($email, $newPassword) {
		$result = $this->update([
			'email' => $email,
			'password' => Hash::make($newPassword),
			'updated_at' => now(),
		]);
		if ($result) {
			return ['success' => true, 'message' => 'Account updated successfully.'];
		}
		return ['success' => false, 'message' => 'Failed to update account.'];
	}

	###[Methods for Database table relationship]

	// Make this 'users' table have relationship to 'students' table
	public function students() {
		return $this->hasMany(Student::class, 'user_id', 'uid');
		//syntax              Model::class, foreign key local key
	}
}
