<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('times', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			$table->string('step');
			$table->integer('page');

			$table->timestamp('start');
			$table->timestamp('end');
			$table->integer('time');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('times');
	}

}
