<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	//Use own primary key instead of primary by Laravel
	protected $primaryKey = 'sid';
	//Specify the field column in database table 'students' that is fillable
	protected $fillable = ['name', 'year', 'course', 'section'];

	//Filters the student by their respective courses, year level and section
	public function filterStudents(array $filters) {
		// latest() get the data from db with the latest or in a descending order
		// oldest() get the data from db with the oldest or in a ascending order
		$query = Student::latest(); //all()
		// Check if filter request is match to the following:
		if ($filters['course'] ?? false) {
			$query->where('course', 'like', '%' . $filters['course'] . '%');
		}

		if ($filters['section'] ?? false) {
			$query->where('section', 'like', '%' . $filters['section'] . '%');
		}

		if ($filters['year'] ?? false) {
			$query->where('year', 'like', '%' . $filters['year'] . '%');
		}

		if ($filters['search'] ?? false) {
			//single search query
			//$query->where('name', 'like', '%' . $filters['search'] . '%');

			//double or multiple search query
			$query->where('name', 'like', '%' . $filters['search'] . '%')
				->orWhere('course', 'like', '%' . $filters['search'] . '%');
		}

		return $query->get(); //$query
	}

	public function addStudentInformation($name, $year, $course, $section) {
		return $this->create([
			'name' => $name,
			'year' => $year,
			'course' => $course,
			'section' => $section,
		]);
	}

	use HasFactory;
}
