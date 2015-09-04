<?php 
namespace App\Repository\Contracts; 

interface RepositoryInterface { 

	public function find($id);

	public function create($data); 

	public function delete($id);

	public function update($id, $data);

	public function findOne($id);

	

}