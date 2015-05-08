<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('return_record', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('Book_id');
			$table->integer('Borrowing_Record_id');
			$table->integer('Return_record_id');
			$table->integer('Return_record_reader_id');
			$table->timestamp('Return_record_date');
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
		Schema::drop('return_record');
	}
	
}