<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');




Route::group(['prefix' => 'admin',  'namespace' => 'Admin'], function(){
	// Route::resource("login")	
	
	Route::get("/", "SiteController@index"); 
	Route::get("/logout", "\App\Http\Controllers\Auth\AuthController@logout");

	Route::resource("restaurant", "RestaurantController");
	Route::resource("attribute", "AttributeController");

});

Route::get('auth/facebook', 'Auth\AuthController@facebook');
Route::get('auth/twitter', 'Auth\AuthController@twitter');
Route::get('auth/googleplus', 'Auth\AuthController@googleplus');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',	
]);

Route::get('test', ['middleware' => 'auth', function(){
	return "YOu have access here";
}]);




// 