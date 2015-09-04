<?php 
namespace App\Repository; 

use App\Repository\Common\BaseRepository as BaseRepository;



class RestaurantRepository  extends BaseRepository {


	public function model(){
		return "App\Restaurant";
	}

}


?>