<?php
namespace App\Repositories\BusRoutine;
use App\Repositories\Crud\CrudInterface;
interface BusRoutineInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
	public function saveSubDestination($data);
	public function deleteSubDestination($id);
	public function removeSubDestination($id);
}