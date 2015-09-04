<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $table = "users";

	protected $fillable = ["password", "email","status"];

	protected $hidden = ["password", "rember_token"];


}
