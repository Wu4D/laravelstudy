<?php namespace App\Http\Requests\Validators;

use App\Http\Requests\Request;

class RestaurantRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email' => 'required|email',	
			'langitude' => 'required', 
			'longitude' => 'required',
			'name' => 'required',
		];
	}

}