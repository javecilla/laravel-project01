<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('accounts', function (Blueprint $table) {
			$table->id('aid');
			//the student id will be the foreign key
			$table->unsignedBigInteger('student_id');
			$table->foreign('student_id')
				->references('sid')
				->on('students')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->string('username');
			$table->string('password');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('accounts', function (Blueprint $table) {
			$table->dropForeign(['student_id']);
			$table->dropColumn('student_id');
		});
	}
};
