<?php
namespace App\Repositories\Bus;
use App\Repositories\Crud\CrudInterface;
interface BusInterface extends CrudInterface{
	public function create($data);
	public function savePivotTable($input);
	public function changeSeatName($id,$value);
	public function update($data,$id);
}