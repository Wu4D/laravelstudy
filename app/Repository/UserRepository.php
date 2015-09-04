<?php namespace App\Repository; 

use App\Repository\Common\BaseRepository as BaseRepository;
use App\Repository\Contracts\UserInterface as UserInterface ;

use App\Repository\Dependency\UserAuthenticate as UserAuthenticate;


class UserRepository extends BaseRepository implements UserInterface {


	public function model(){
		return 'App\User';
	}

	public function register($data){
		array_except($data, ['provider_id', 'provider']);

		$this->create($data); 

	}

	public function loginwithFacebook(UserAuthenticate $userAuthenticate){

		$userAuthenticate->setProvider("facebook");

		return $this->loginWithProvider($data, "facebook");

	}

	protected function loginWithProvider($data, $provider = ""){
		$data = !is_object($data) ?: (array) $data;

		$data = array_except($data, ["password"]);

		$data = !isset($data['user']) && !is_array($data['user']) ? : array_merge($data,$data['user']);

		$data['provider_id'] = $data['id'];
		$data['provider'] = "facebook";
		
		unset($data['id']);
	
		if($user = $this->updateProvider($data)){
			return $user;
		}

		return $this->create($data);
		
	}



	public function checkCredentials(array $data){


	}

	public function create($data){
		if(isset($data['password'])){
			$data['password']	= bcrypt($data['password']);
		}	
		// dd($data);
		parent::create($data);
	}

}

?>