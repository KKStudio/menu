<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KkstudioCreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kkstudio_menu_menu', function($table) {

			$table->increments('id');
			$table->integer('enabled');
			$table->integer('lp');
			$table->string('display_name');
			$table->string('slug');
			$table->string('route');
			$table->string('params');
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
		Schema::drop('kkstudio_menu_menu');
	}

}
