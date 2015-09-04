<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create("comments", function($table){
		// 	// $table->increments("id"); 
		// 	// $table->morphs("comment"); 
		// 	// $table->softDeletes();
		// 	// $table->timestamps(); 
		// 	// $table->longText("comment"); 
		// 	// $table->integer("user_id")->unsigned();
		// 	// $table->foreign("user_id")->references("id")->on("users");
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::dropIfExists("comments");
	}

}
