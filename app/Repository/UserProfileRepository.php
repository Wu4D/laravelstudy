<?php 
namespace App\Repository; 
use App\Repository\Common\BaseRepository as BaseRepository;

class UserProfileRepository extends BaseRepository {

	public function model(){
		return 'App\UserProfile';
	}
	

}
