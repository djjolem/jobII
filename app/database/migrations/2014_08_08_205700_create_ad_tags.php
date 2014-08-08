<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('ad_tags', function ($table) {
			if (Schema::hasTable('ads') && Schema::hasTable('tags')) {
				$table->unsignedInteger('ad_id');
				$table->unsignedInteger('tag_id');
				
				$table->foreign('ad_id')->references('id')->on('ads');
				$table->foreign('tag_id')->references('id')->on('tags');
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
		Schema::drop('ad_tags');
	}

}
