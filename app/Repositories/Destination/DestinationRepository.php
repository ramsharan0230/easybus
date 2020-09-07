<?php
namespace App\Repositories\Destination;
use App\Models\Destination;
use App\Repositories\Crud\CrudRepository;
class DestinationRepository extends CrudRepository implements DestinationInterface{
	public function __construct(Destination $destination){
		$this->model=$destination;
		
	}
	public function create($input){
		$this->model->create($input);
	}
	public function update($input,$id){
		$this->model->find($id)->update($input);
	}
	
}