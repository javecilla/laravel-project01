<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		$years = ['1st year', '2nd year', '3rd year', '4th year'];
		$courses = ['BSIT', 'BSCS', 'BSIS', 'BSCE'];
		$sections = ['Demacia G1', 'Noxus G2', 'Darkin G3', 'Yordle G4'];
		return [
			'name' => $this->faker->name(),
			'year' => $this->faker->randomElement($years),
			'course' => $this->faker->randomElement($courses),
			'section' => $this->faker->randomElement($sections),
		];
	}
}
