<?php namespace App\Repository\Dependency; 

use Laravel\Socialite\Contracts\Factory as Socialite; 
use Illuminate\Http\Request as Request;
use Illuminate\Auth\Guard as Guard;

use App\Repository\UserRepository as UserRepository;
use App\Repository\SocialUserRepository as SocialUserRepository;
use App\Repository\UserProfileRepository as UserProfile;


use App\Repository\Contracts\AuthListener as AuthListener;

class UserAuthenticate {

	protected $socialite;
	protected $provider;
	protected $auth;
	protected $userRepository;
	protected $listener;
	protected $socialUser;
	protected $userProfile;

	protected $allowedProviders = ['facebook','google','twitter'];

	public function __construct(Socialite $socialite, Guard $auth, Request $request, UserRepository $user, SocialUserRepository $socialUser, UserProfile $userProfile){
		$this->auth = $auth;
		$this->socialite = $socialite;
		$this->request = $request;	
		$this->userRepository = $user;
		$this->socialUser = $socialUser;
		$this->userProfile = $userProfile;
	}


	public function loginWithProvider($provider ){

		if(!in_array(strtolower($provider), $this->allowedProviders)){
			throw new \Exception("There is no implementation for driver {$provider} \n Accepted drivers are facebook,google,twitter". 1);
		}
		
		$this->provider = $provider;
		// var_dump($this->request->all());
		if(!$this->request->has($this->getTokenName())){
			
			return $this->getToken();
		}else{
			return $this->processProviderUser($this->getProviderUser());
		}
	}

	public function getToken(){
		return $this->socialite->driver($this->provider)->redirect(); 
	}

	public function setProvider($provider){
		$this->provider = $provider;
	}

	public function with($provider, AuthListener $listener){
		$this->listener = $listener;
		return $this->loginWithProvider($provider);
	}

	public function getProviderUser(){
		return  $this->formatUserProvider($this->socialite->with($this->provider)->user());
	}


	public function checkAndUpdate(array $data){
		$user = $this->userRepository->findOne(['email' => $data['email']]);

		if($user && $user->exists() && count(array_diff($user->toArray(), array_except($data, "user") )) > 0 ){
			$user->update($data);
			return $user; 
		}
	}

	public function getTokenName(){
		switch ($this->provider) {
			case 'facebook':
			case 'google':

				return "code";
			break;

			case 'twitter':
				return 'oauth_token';
			break;

			default:

			break;
		}
	}


	public function processProviderUser($providerUser){

		$profile_id = $this->getProfileIdByEmail($providerUser['email']);

		if(!$user = $this->socialUser->findByProviderId($providerUser)){
			$this->userProfile->createOrUpdate(['id' => $profile_id], $providerUser);
			$user = $this->socialUser->set($providerUser)->userProfile($this->userProfile);
		}

		$this->auth->login($user, true);
		return $this->listener->userHasLoggedIn();

	}

	public function getProfileIdByEmail($email){

		$user = $this->userRepository->find(['email' => $email]);

		if($user && $this->userRepository->exists){
			return $user->profile_id;
		}else{
			return 0;
		}
	}


	public function getProfileIdByProvider(){
		if($user = $this->socialUserRepository->find(['provider_id' =>$params['provider_id'], 'provider' => $this->provider])){
			return $user->profile_id;
		}else{
			return false;
		}
	}

	protected function formatUserProvider($user){
		switch ($this->provider) {
			case 'google':
					return $this->formatGoogleUser($user);
				break;
			case 'facebook':
					return $this->formatFacebookUser($user);
				break;
			case 'twitter':
					return $this->formatTwitter($user);
				break;
			default:
				# code...
				break;
		}
	}

	protected function formatGoogleUser($data){

		$user = [
			'first_name' => $data->user['name']['familyName'], 
			'last_name' => $data->user['name']['givenName'],
		]; 

		$data = (array) $data;
		$data = array_merge(['provider_name' => $this->provider, 'provider_id' => $data['id']], $data);
		unset($data['user'], $data['id']);

		$user = array_merge($data,$user);
		
		return $user;

	}	

	protected function formatFacebook($data){

	}

	protected function formatTwitter($data){

	}








}
?>