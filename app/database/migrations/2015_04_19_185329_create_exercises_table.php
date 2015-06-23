<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercises', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->timestamps();

			$table->string('step', 1023);
			$table->integer('page')->nullable();
			
			$table->text('code');

			$table->integer('tries')->default('0');
			$table->boolean('passed')->default('0');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('exercises');
	}

}
