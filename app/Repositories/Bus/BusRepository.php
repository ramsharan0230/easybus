<?php
namespace App\Repositories\Bus;
use App\Models\Bus;
use App\Models\BusSeat;
use App\Repositories\Crud\CrudRepository;
class BusRepository extends CrudRepository implements BusInterface{
	public function __construct(Bus $bus,BusSeat $seat){
		$this->model=$bus;
		$this->seat=$seat;
	}
	public function create($data){
		$bus=$this->model->create($data);
		if($bus){
			return $bus->id;
		}
		return false;
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
	public function savePivotTable($input){
		$this->seat->create($input);
	}
	public function changeSeatName($id,$value){
		$seat=$this->seat->find($id);
		$seat->seat_name=$value;
		$seat->save();
	}
}