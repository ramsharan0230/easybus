<?php
namespace App\Repositories\TempBooking;
use App\Models\TempBooking;
use App\Repositories\Crud\CrudRepository;
class TempBookingRepository extends CrudRepository implements TempBookingInterface{
	public function __construct(TempBooking $tempbooking){
		$this->model=$tempbooking;
	}
	public function create($data){
		$result=$this->model->create($data);
	}
}