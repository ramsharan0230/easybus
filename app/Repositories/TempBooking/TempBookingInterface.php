<?php
namespace App\Repositories\TempBooking;
use App\Repositories\Crud\CrudInterface;
interface TempBookingInterface extends CrudInterface{
	public function create($data);
}