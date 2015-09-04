<?php namespace App\Http\Controllers\Auth;

use Socialite;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\AuthListener as AuthListener;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Repository\UserRepository as UserRepository;

use App\Repository\Dependency\UserAuthenticate as UserAuthenticate;



class AuthController extends Controller implements AuthListener {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{



		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function facebook(UserAuthenticate $userAuthenticate){
		return $userAuthenticate->with('facebook', $this);
		

	}

	public function twitter(UserAuthenticate $userAuthenticate){
		return $userAuthenticate->with('twitter', $this);
		
	}

	public function googleplus(UserAuthenticate $userAuthenticate){
		return $userAuthenticate->with('google', $this);
	}

	public function userHasLoggedIn(){
		return redirect()->intended();

	}



	

}
