<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerService extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer(["*._form", "*.create"], function($view){
			$base_route = app('request')->route();
			$action = $base_route->getAction();
			$parameters = $base_route->parameters();


			$method = explode("@", $action['uses']); 
			$method = $method[count($method) - 1];
			$controller = str_replace('@'.$method, "", $action['uses']); 
			$_form['parameters'] = $parameters;

			if($method == "edit"){
				$_form['action'] = "\\".$controller."@update"; 
				$_form['method'] = "put";
		
			}elseif($method == "create"){
				$_form['action'] = "\\".$controller."@index";
				$_form['method'] = "post";

			}	

			$_form['model'] = "";
			$data = $view->getData();
			

			if(isset($data['_form']) ){

				if(is_array($data['_form'])){
				$_form['model'] =  $data['_form']['model'];

				}elseif(is_object($data['_form'])){
					$_form['model'] = $data['_form']->model;
				}

			}

			$_form = (Object)$_form;

			$view->with(compact('_form'));

		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		
	}

}
