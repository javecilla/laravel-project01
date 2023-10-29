<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('students', function (Blueprint $table) {
			$table->bigIncrements('sid');
			$table->foreignId('user_id')
				->constrained()
				->references('uid')
				->on('users')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->string('name');
			$table->string('year');
			$table->string('course');
			$table->string('section');
			$table->string('profile')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('students');
	}
};
