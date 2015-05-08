<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('readers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('style_id');
			$table->integer('class_id');
			$table->integer('grade_id');
			$table->integer('professionl_id');
			$table->string('sex');
			$table->date('birthday');
			$table->integer('dep_id');
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
		Schema::drop('readers');
	}

}
