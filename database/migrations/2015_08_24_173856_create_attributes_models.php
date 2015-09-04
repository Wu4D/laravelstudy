<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesModels extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("attributes_models", function(Blueprint $table){
			$table->increments("id");
			$table->morphs("attributable");

			$table->integer("attribute_id")->unsigned()->index("attribute_id");
			$table->foreign("attribute_id")->references("id")->on("attributes"); 
			// $table->unsigned("attribute_id")->index("attribute_id");

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
		Schema::dropIfExists("attributes_models");
	}

}
