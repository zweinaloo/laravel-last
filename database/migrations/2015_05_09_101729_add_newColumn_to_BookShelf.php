<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToBookShelf extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('book_shelf', function(Blueprint $table)
		{
			//
			$table->integer('room_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	Schema::table('readers', function(Blueprint $table)
		{
			//
			$table->dropColumn('room_id');
		});
		//
	}

}
