<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdLocation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('ads', function($table) {
			if (Schema::hasTable('ads')) {
				$table->string('location', 50)->after('deadline');
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
		Schema::table('ads', function($table) {
			if (Schema::hasTable('ads')) {
				$table->dropColumn('location');
			}
		});
	}

}
