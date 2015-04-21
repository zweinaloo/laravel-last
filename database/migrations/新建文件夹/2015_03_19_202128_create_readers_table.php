<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('readers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
		
			$table->string('phoneno');
			$table->string('sex');
			$table->string('mark');
			
			
			
			
			
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
		Schema::drop('readers');
	}

}
