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
			$table->string("password", 60);
			$table->string("email")->unique();
			$table->integer('user_profile_id')->unsigned();
			$table->foreign("user_profile_id")->references("id")->on("user_profiles");
			$table->timestamps();
			$table->rememberToken();
			$table->tinyInteger('status');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
