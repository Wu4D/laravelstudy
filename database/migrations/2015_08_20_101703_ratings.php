<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ratings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("ratings", function($table){
			$table->increments("id"); 
			$table->morphs("rating"); 
			$table->softDeletes();
			$table->timestamps();
			$table->float("votes");
			$table->float("total");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("ratings");
	}

}
