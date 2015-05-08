<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 书籍表 book
		 */
		Schema::create('book', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('Book_id');
			$table->integer('shelf_id');
			$table->integer('style_id');
			$table->string('Book_name');
			$table->string('writer');
			$table->integer('count');
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
		//
		Schema::drop('book');
	}

}
