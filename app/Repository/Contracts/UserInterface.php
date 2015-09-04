<?php
namespace App\Repository\Contracts; 

use App\Repository\Dependency\UserAuthenticate as UserAuthenticate;

interface UserInterface {


	public function register($data); 

	public function checkCredentials( array $data);


}