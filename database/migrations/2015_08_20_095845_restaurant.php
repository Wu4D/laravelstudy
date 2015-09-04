<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Restaurant extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('restaurants', function($table){
			$table->increments("id"); 
			$table->string("name"); 
			$table->string("langitude"); 
			$table->string("longitude"); 
			$table->string("phone"); 
			$table->string("email");
			$table->softDeletes(); 
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
		Schema::dropIfExists("restaurant");
		Schema::dropIfExists("restaurants");


	}

}
