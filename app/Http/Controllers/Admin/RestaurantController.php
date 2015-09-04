<?php namespace App\Http\Controllers\Admin;

use App\Repository\RestaurantRepository;

use App\Http\Requests\Validators\RestaurantRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RestaurantController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $restaurants;

	public function __construct(RestaurantRepository $repository){
		$this->restaurants = $repository;
	}

	public function index( )
	{	

		$results = $this->restaurants->paginateResults(10);
		$links = $this->restaurants->renderPaginate();
		return view("admin.restaurant.index", compact('results','links'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		// $Restaurant = Restaurant::All();
		return view("admin.restaurant.create", ["restaurant" => '']);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RestaurantRequest $request)
	{
	
			$this->restaurants->create($request->all());
			
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// var_dump($this->restaurants->find($id));
		//
		if(view()->exists("admin.index")){
			die("DA");
		}else{
			die("NU");
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$restaurant = $this->restaurants->find($id);

		return view("admin.restaurant.create", ["_form" => ["model" => $restaurant]]);
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, RestaurantRequest $request)
	{
		$restaurant = $this->restaurants->update($id, $request->all());

		return redirect()->back()->with('success', 'Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
