<?php
namespace App\Repositories\BusRoutine;
use App\Models\BusRoutine;
use App\Repositories\Crud\CrudRepository;
use App\Models\SubDestination;
class BusRoutineRepository extends CrudRepository implements BusRoutineInterface{
	public function __construct(BusRoutine $busroutine,SubDestination $sub_destination){
		$this->model=$busroutine;
		$this->sub_destination=$sub_destination;
	}
	public function create($data){
		
		$result=$this->model->create($data);
		if($result){
			return $result;
		}
	}
	public function update($data,$id){
		
		$result=$this->model->find($id)->update($data);
		if($result){
			return $result;
		}else{
			return;
		}
	}
	public function saveSubDestination($data){
		$this->sub_destination->create($data);
	}
	public function deleteSubDestination($id){
		$this->sub_destination->where('busroutine_id',$id)->delete();
	}
	public function removeSubDestination($id){
		
		$this->sub_destination->destroy($id);
	}
}