<?php
namespace App\Repository; 

use App\Repository\Common\BaseRepository as BaseRepository; 
use App\Repository\UserProfileRepository as UserProfileRepository;

class SocialUserRepository extends BaseRepository {

	private $relation = true;
	protected $userProfile;

	public function __construct(UserProfileRepository $userProfile){
		parent::__construct();
		$this->userProfile = $userProfile;
	}

	public function model(){
		return 'App\SocialUser';
	}




	public function createOrUpdateWith($relation = array('repositoy' => null, 'data' => null), $socialData){
		if($relation['repositoy'] && $relation['data'] ){
		}else{
			throw new \Exception("Create OrUpdate needs a array with repository and data", 1);
			
		}
	}

	public function userProfile(UserProfileRepository $userProfile){

		$this->model->userProfile()->associate($userProfile->model);

		$this->model->save();

		return $this->model;
	}

	public function findByProviderId($providerUser){
		return $this->findOne(['provider_name' => $providerUser['provider_name'], 'provider_id' => $providerUser['provider_id']]);
	}

	public function find($params){
		return parent::find($params);
	}

	













}

