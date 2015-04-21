<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookStylesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_styles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tyleName')->unique();
			$table->integer('borrowingCount');
			$table->integer('borrowingPeriod');
			$table->integer('readerValidity');
			$table->string('readerMark');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_styles');
	}

}
