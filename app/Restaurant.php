<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {


	protected $table = "restaurants"; 

	protected $fillable = ['langitude', 'longitude', 'phone', 'email', 'name']; 

}
