<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ads', function($table) {
			$table->increments('id');
			$table->string('title', 256);
			$table->string('short', 256);
			$table->text('ad_text');
			$table->timestamp('deadline');
			$table->integer('fk_user');
			$table->integer('fk_company');
			$table->timestamps();
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
		Schema::drop('ads');
	}

}
