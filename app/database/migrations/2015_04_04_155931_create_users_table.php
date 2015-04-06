<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->timestamps();

			$table->string('email', 1023);
			$table->string('currentStep', 255);
			$table->integer('currentPage', 10)->unsigned();
			$table->boolean('a1');
			$table->boolean('a21');
			$table->boolean('a22');
			$table->boolean('r3');
			$table->boolean('c2');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
