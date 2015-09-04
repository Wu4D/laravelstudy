<?php 
namespace App\Repository\Common;
use App\Repository\Contracts\RepositoryInterface as RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface {

	public $model;

	public $paginate_links;

	protected $association;
	protected $assocation;

	public $exists = false;



	public function __construct(){
		$this->makeModel(); 
	}

	public function makeModel(){
		$class = $this->model();

		return $this->model = new $class;

	}

	public function find($params){
		$model = null;
		if(is_numeric($params)){
			$model = $this->model->find($params);
			$this->exists = $model->exists() ?: false;


		}elseif(is_array($params)){

			$model =  $this->model->where(function($q) use ($params){
				foreach($params as $param => $value){
					$q->where($param, '=', $value);
				}
			})->get();

			$this->exists = $model->count() > 0  ? true : false;
			
		}
		$this->model = $model;
		
		return $model;

	}

	public function findOrSet($params, $data){
		if(!$this->find($params)){
			$this->set($data);
		}

		return $this;
	}

	public function delete($id){
		$model = $this->model->find($id); 
		$model->delete();
	}


	public function create($data){

		$model = new $this->model($data); 

		if($this->association){

			// dd($this->association);

			$model_assocation = $this->association['association'];
			// dd($model);
			$model->$model_assocation()->associate($this->association); 
			$this->association = null;
		}

		$model->save();
		return $model;
	}
	

	public function update($id, $data){

		$model =  $this->model->find($id);
		if($this->model->exists()){
			
			if($this->association){
				dd($this->association);
				$model->associate($this->association['model']); 
				$this->association = null;
			}
			$model->update($data); 
		}
	}

	public function paginateResults($records,$page = 0){

		$results = $this->model->paginate($records); 
		$this->paginate_links = $results->render();
		return  $results;

	}

	public function renderPaginate(){
		return $this->paginate_links;
	}


	public function findOne($params){

		if(is_numeric($params)){
			$model = $this->model->find($params);
			if($model->exists()){
				$this->exists = $model->exists() ?: false;
			}


		}elseif(is_array($params)){
			$model =  $this->model->where(function($q) use ($params){
				foreach($params as $param => $value){
					$q->where($param, '=', $value);
				}
			})->first();

			if($model){
				$this->exists = $model->exists() ?: false;
			}

		}
		$this->model = $model;
		return $model;

	}

	public function createOrUpdate($params = false,$data){

		$model = $this->model->find($params); 

		if($model != null && $this->model->exists){

			//Compare new data vs old data 
			if(count(array_diff($model->toArray(), $data)) > 0 ){

				$model = $this->update($model->id, $data); 

			}else{

				return $model; 
			}
		}else{
			$model = $this->create($data);
		}

		$this->model = $model;
		return $model;

	}

	public function associate($relationship, $data){

		$model = new $relationship['relation_model']; 
		if(isset($data['id'])){
			$model = $model->createOrUpdate(['id' => $data['id']], $data); 
		}else{
			// dd($model);
			$model = $model->create($data);
		}

		$this->association = ['model' => $model, 'association' => (isset($relationship['association']) ? $relationship['association'] : "")];

		return $this;
		
	}

	public function set($data){
		$model = $this->model();
		$this->model = new $model($data);
		return $this;
	}

	abstract function model();



}