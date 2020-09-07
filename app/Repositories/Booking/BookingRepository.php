<?php
namespace App\Repositories\Booking;
use App\Models\BusBooking;
use App\Repositories\Crud\CrudRepository;
class BookingRepository extends CrudRepository implements BookingInterface{
	public function __construct(BusBooking $booking){
		$this->model=$booking;
	}
	public function create($data){
		$result=$this->model->create($data);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
}