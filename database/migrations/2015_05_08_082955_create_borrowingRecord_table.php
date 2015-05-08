<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowingRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('borrowing_record', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('Book_id');
			$table->integer('Borrowing_Record_reader_id');
			$table->timestamp('Borrowing_Record_date');
			$table->timestamp('havetoreturn');
			$table->string('Borrowing_Record_mark');
			$table->boolean('isreturn');
			$table->string('Book_shelf_name');

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
		Schema::drop('borrowing_record');
	}

}
