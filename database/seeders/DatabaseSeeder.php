<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 */
	public function run(): void {
		//Student::factory(8)->create();
		Account::factory(1)->create();
		// Student::create([
		//  'name' => 'Lux Delulu',
		//  'year' => '1st Year'
		//  'course' => 'BSIT'
		//  'section' => 'Bright 2H',
		// ]);
	}
}
