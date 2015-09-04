<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	protected $table = 'user_profiles';

	protected $fillable = ['last_name', 'gender', 'first_name', 'last_name', 'name'];

	public function socialUser(){
		$this->hasOne('App\SocialUser');
	}

	
}
