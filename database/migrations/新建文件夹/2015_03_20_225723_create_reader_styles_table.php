<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderStylesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reader_styles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('borrowCount');
			$table->integer('borrowPeriod');
			$table->integer('Validity');
			$table->integer('mark');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reader_styles');
	}

}
