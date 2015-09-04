<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Validators\AttributeRequest as AttributeRequest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repository\AttributeRepository as AttributeRepository;

class AttributeController extends Controller {

	protected $attribute;


	public function __construct(AttributeRepository $repo){
		$this->attribute = $repo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$results = $this->attribute->paginateResults(20);
		$paginate_links = $this->attribute->renderPaginate();
		return view("admin.attribute.index", compact('results', 'paginate_links'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return view('admin.attribute.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AttributeRequest $request)
	{
		$this->attribute->create($request->all());
		return redirect()->back()->with('success', 'Attributed Saved');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $attriubte$attribute->find($id);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, AttributeRequest $request)
	{
		$this->attribute->update($id, $request->all());
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
