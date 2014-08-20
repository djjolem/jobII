<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('tags')->insert(
			array(
				array('name' => 'HTML'),
				array('name' => 'CSS'),
				array('name' => 'PHP'),
				array('name' => 'Laravel'),
				array('name' => 'MySQL'),
				array('name' => 'Apache'),
			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::table('tags')->delete();
	}

}
