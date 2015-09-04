<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model {

	protected $table = "social_users"; 

	protected $fillable = ['provider_id', 'provider_name', 'profile_id'];

	public function userProfile(){
		return $this->belongsTo("App\UserProfile");
	}

	
}
