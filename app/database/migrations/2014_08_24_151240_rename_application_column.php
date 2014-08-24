<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameApplicationColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('applications', function($table) {
			$table->renameColumn('path_to_cv', 'cv_filename');
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
		Schema::table('applications', function($table) {
			$table->renameColumn('cv_filename', 'path_to_cv');
		});
	}

}
