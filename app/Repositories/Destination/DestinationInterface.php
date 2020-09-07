<?php
namespace App\Repositories\Destination;
use App\Repositories\Crud\CrudInterface;
interface DestinationInterface extends CrudInterface{
	public function create($input);
	public function update($data,$id);
	
}