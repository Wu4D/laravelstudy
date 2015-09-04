<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],


	'facebook' => [
		'client_id' => '1647532648826545',
		'client_secret' => 'a44460ffde12be941c92b0d1a13eacef',
		'redirect' => 'http://dev01.dev:8000/auth/facebook',

	], 

	'twitter' => [
		'client_id' => 'WOE5EAjUimS2fyBEMKKgHud1V', 
		'client_secret' => 'Z7Hw6IkBcgGOsVnMbKCmlhyP90GWE7KtkIacjVTP1iTSYzyWis',
		'redirect' => 'http://dev01.dev:8000/auth/twitter'
	],

	'google' => [

		'client_id' => '170638747972-q1js70opv45bj1i95j3fu6opod9s02ou.apps.googleusercontent.com',
		'client_secret' => 'wumBQXl8hxLnAF871opxMn9E', 
		'redirect' => 'http://dev01.dev:8000/auth/googleplus'
	],


];
