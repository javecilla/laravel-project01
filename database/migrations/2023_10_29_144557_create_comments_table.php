<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('comments', function (Blueprint $table) {
			$table->bigIncrements('cid');
			$table->foreignId('post_id') //make relation this comments to posts table
				->constrained()
				->references('pid')
				->on('posts')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->foreignId('student_id')->nullable() //make relation this comments to students table
				->constrained()
				->references('sid')
				->on('students')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->text('context');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('comments');
	}
};
