<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("provider_id", 50);
			$table->string("provider_name"); 
			$table->integer("user_profile_id")->unsigned(); 
			$table->foreign("user_profile_id")->references("id")->on("user_profiles");
			$table->rememberToken();
			$table->timestamps();
			$table->tinyInteger("status");

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('social_users');
	}

}
