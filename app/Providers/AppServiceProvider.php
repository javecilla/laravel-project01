<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 */
	public function register(): void {
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void {
		// Allow the data schema to create freely database table
		Schema::defaultStringLength(191);
		// Ungruard the database model
		// use Illuminate\Database\Eloquent\Model;
		//Model::unguard();
	}
}
