<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_companies', function ($table) {
			if (Schema::hasTable('users') && Schema::hasTable('companies')) {
				$table->unsignedInteger('user_id');
				$table->unsignedInteger('company_id');
				
				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('company_id')->references('id')->on('companies');
			}
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('user_companies');
	}

}
