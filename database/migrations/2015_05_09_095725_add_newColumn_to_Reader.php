<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToReader extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('readers', function(Blueprint $table)
		{
			//
			$table->string('mark');
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	
		Schema::table('readers', function(Blueprint $table)
		{
			//
			$table->dropColumn('mark');
		});
		//
	}

}
