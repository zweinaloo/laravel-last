<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderStyleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('reader_style', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('style_name');
			$table->integer('Borrowing_count');
			$table->integer('Borrowing_period');
			$table->integer('Validity');
			$table->integer('Renew');
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
		Schema::drop('reader_style');
	}

}
